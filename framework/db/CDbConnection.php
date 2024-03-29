<?php
/**
 * CDbConnection class file
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CDbConnection represents a connection to a database.
 *
 * CDbConnection works together with {@link CDbCommand}, {@link CDbDataReader}
 * and {@link CDbTransaction} to provide data access to various DBMS
 * in a common set of APIs. They are a thin wrapper of the {@link http://www.php.net/manual/en/ref.pdo.php PDO}
 * PHP extension.
 *
 * To establish a connection, set {@link setActive active} to true after
 * specifying {@link connectionString}, {@link username} and {@link password}.
 *
 * The following example shows how to create a CDbConnection instance and establish
 * the actual connection:
 * <pre>
 * $connection=new CDbConnection($dsn,$username,$password);
 * $connection->active=true;
 * </pre>
 *
 * After the DB connection is established, one can execute an SQL statement like the following:
 * <pre>
 * $command=$connection->createCommand($sqlStatement);
 * $command->execute();   // a non-query SQL statement execution
 * // or execute an SQL query and fetch the result set
 * $reader=$command->query();
 *
 * // each $row is an array representing a row of data
 * foreach($reader as $row) ...
 * </pre>
 *
 * One can do prepared SQL execution and bind parameters to the prepared SQL:
 * <pre>
 * $command=$connection->createCommand($sqlStatement);
 * $command->bindParam($name1,$value1);
 * $command->bindParam($name2,$value2);
 * $command->execute();
 * </pre>
 *
 * To use transaction, do like the following:
 * <pre>
 * $transaction=$connection->beginTransaction();
 * try
 * {
 *    $connection->createCommand($sql1)->execute();
 *    $connection->createCommand($sql2)->execute();
 *    //.... other SQL executions
 *    $transaction->commit();
 * }
 * catch(Exception $e)
 * {
 *    $transaction->rollBack();
 * }
 * </pre>
 *
 * CDbConnection also provides a set of methods to support setting and querying
 * of certain DBMS attributes, such as {@link getNullConversion nullConversion}.
 *
 * Since CDbConnection implements the interface IApplicationComponent, it can
 * be used as an application component and be configured in application configuration,
 * like the following,
 * <pre>
 * array(
 *     'components'=>array(
 *         'db'=>array(
 *             'class'=>'CDbConnection',
 *             'connectionString'=>'sqlite:path/to/dbfile',
 *         ),
 *     ),
 * )
 * </pre>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CDbConnection.php 2621 2010-11-05 18:53:15Z qiang.xue $
 * @package system.db
 * @since 1.0
 */
class CDbConnection extends CApplicationComponent
{
	/**
	 * @var string The Data Source Name, or DSN, contains the information required to connect to the database.
	 * @see http://www.php.net/manual/en/function.PDO-construct.php
	 */
	public $connectionString;
	/**
	 * @var string the username for establishing DB connection. Defaults to empty string.
	 */
	public $username='';
	/**
	 * @var string the password for establishing DB connection. Defaults to empty string.
	 */
	public $password='';
	/**
	 * @var integer number of seconds that table metadata can remain valid in cache.
	 * Use 0 or negative value to indicate not caching schema.
	 * If greater than 0 and the primary cache is enabled, the table metadata will be cached.
	 * @see schemaCachingExclude
	 */
	public $schemaCachingDuration=0;
	/**
	 * @var array list of tables whose metadata should NOT be cached. Defaults to empty array.
	 * @see schemaCachingDuration
	 */
	public $schemaCachingExclude=array();
	/**
	 * @var string the ID of the cache application component that is used to cache the table metadata.
	 * Defaults to 'cache' which refers to the primary cache application component.
	 * Set this property to false if you want to disable caching table metadata.
	 * @since 1.0.10
	 */
	public $schemaCacheID='cache';
	/**
	 * @var boolean whether the database connection should be automatically established
	 * the component is being initialized. Defaults to true. Note, this property is only
	 * effective when the CDbConnection object is used as an application component.
	 */
	public $autoConnect=true;
	/**
	 * @var string the charset used for database connection. The property is only used
	 * for MySQL and PostgreSQL databases. Defaults to null, meaning using default charset
	 * as specified by the database.
	 */
	public $charset;
	/**
	 * @var boolean whether to turn on prepare emulation. Defaults to false, meaning PDO
	 * will use the native prepare support if available. For some databases (such as MySQL),
	 * this may need to be set true so that PDO can emulate the prepare support to bypass
	 * the buggy native prepare support. Note, this property is only effective for PHP 5.1.3 or above.
	 */
	public $emulatePrepare=false;
	/**
	 * @var boolean whether to log the values that are bound to a prepare SQL statement.
	 * Defaults to false. During development, you may consider setting this property to true
	 * so that parameter values bound to SQL statements are logged for debugging purpose.
	 * You should be aware that logging parameter values could be expensive and have significant
	 * impact on the performance of your application.
	 * @since 1.0.5
	 */
	public $enableParamLogging=false;
	/**
	 * @var boolean whether to enable profiling the SQL statements being executed.
	 * Defaults to false. This should be mainly enabled and used during development
	 * to find out the bottleneck of SQL executions.
	 * @since 1.0.6
	 */
	public $enableProfiling=false;
	/**
	 * @var string the default prefix for table names. Defaults to null, meaning no table prefix.
	 * By setting this property, any token like '{{tableName}}' in {@link CDbCommand::text} will
	 * be replaced by 'prefixTableName', where 'prefix' refers to this property value.
	 * @since 1.1.0
	 */
	public $tablePrefix;
	/**
	 * @var array list of SQL statements that should be executed right after the DB connection is established.
	 * @since 1.1.1
	 */
	public $initSQLs;

	private $_attributes=array();
	private $_active=false;
	private $_pdo;
	private $_transaction;
	private $_schema;


	/**
	 * Constructor.
	 * Note, the DB connection is not established when this connection
	 * instance is created. Set {@link setActive active} property to true
	 * to establish the connection.
	 * @param string $dsn The Data Source Name, or DSN, contains the information required to connect to the database.
	 * @param string $username The user name for the DSN string.
	 * @param string $password The password for the DSN string.
	 * @see http://www.php.net/manual/en/function.PDO-construct.php
	 */
	public function __construct($dsn='',$username='',$password='')
	{
		$this->connectionString=$dsn;
		$this->username=$username;
		$this->password=$password;
	}

	/**
	 * Close the connection when serializing.
	 */
	public function __sleep()
	{
		$this->close();
		return array_keys(get_object_vars($this));
	}

	/**
	 * @return array list of available PDO drivers
	 * @see http://www.php.net/manual/en/function.PDO-getAvailableDrivers.php
	 */
	public static function getAvailableDrivers()
	{
		return PDO::getAvailableDrivers();
	}

	/**
	 * Initializes the component.
	 * This method is required by {@link IApplicationComponent} and is invoked by application
	 * when the CDbConnection is used as an application component.
	 * If you override this method, make sure to call the parent implementation
	 * so that the component can be marked as initialized.
	 */
	public function init()
	{
		parent::init();
		if($this->autoConnect)
			$this->setActive(true);
	}

	/**
	 * @return boolean whether the DB connection is established
	 */
	public function getActive()
	{
		return $this->_active;
	}

	/**
	 * Open or close the DB connection.
	 * @param boolean $value whether to open or close DB connection
	 * @throws CException if connection fails
	 */
	public function setActive($value)
	{
		if($value!=$this->_active)
		{
			if($value)
				$this->open();
			else
				$this->close();
		}
	}

	/**
	 * Opens DB connection if it is currently not
	 * @throws CException if connection fails
	 */
	protected function open()
	{
		if($this->_pdo===null)
		{
			if(empty($this->connectionString))
				throw new CDbException(Yii::t('yii','CDbConnection.connectionString cannot be empty.'));
			try
			{
				Yii::trace('Opening DB connection','system.db.CDbConnection');
				$this->_pdo=$this->createPdoInstance();
				$this->initConnection($this->_pdo);
				$this->_active=true;
			}
			catch(PDOException $e)
			{
				if(YII_DEBUG)
				{
					throw new CDbException(Yii::t('yii','CDbConnection failed to open the DB connection: {error}',
						array('{error}'=>$e->getMessage())),(int)$e->getCode(),$e->errorInfo);
				}
				else
				{
					Yii::log($e->getMessage(),CLogger::LEVEL_ERROR,'exception.CDbException');
					throw new CDbException(Yii::t('yii','CDbConnection failed to open the DB connection.'),(int)$e->getCode(),$e->errorInfo);
				}
			}
		}
	}

	/**
	 * Closes the currently active DB connection.
	 * It does nothing if the connection is already closed.
	 */
	protected function close()
	{
		Yii::trace('Closing DB connection','system.db.CDbConnection');
		$this->_pdo=null;
		$this->_active=false;
		$this->_schema=null;
	}

	/**
	 * Creates the PDO instance.
	 * When some functionalities are missing in the pdo driver, we may use
	 * an adapter class to provides them.
	 * @return PDO the pdo instance
	 * @since 1.0.4
	 */
	protected function createPdoInstance()
	{
		$pdoClass='PDO';
		if(($pos=strpos($this->connectionString,':'))!==false)
		{
			$driver=strtolower(substr($this->connectionString,0,$pos));
			if($driver==='mssql' || $driver==='dblib')
				$pdoClass='CMssqlPdoAdapter';
		}
		return new $pdoClass($this->connectionString,$this->username,
									$this->password,$this->_attributes);
	}

	/**
	 * Initializes the open db connection.
	 * This method is invoked right after the db connection is established.
	 * The default implementation is to set the charset for MySQL and PostgreSQL database connections.
	 * @param PDO $pdo the PDO instance
	 */
	protected function initConnection($pdo)
	{
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if($this->emulatePrepare && constant('PDO::ATTR_EMULATE_PREPARES'))
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
		if($this->charset!==null)
		{
			$driver=strtolower($pdo->getAttribute(PDO::ATTR_DRIVER_NAME));
			if(in_array($driver,array('pgsql','mysql','mysqli')))
				$pdo->exec('SET NAMES '.$pdo->quote($this->charset));
		}
		if($this->initSQLs!==null)
		{
			foreach($this->initSQLs as $sql)
				$pdo->exec($sql);
		}
	}

	/**
	 * @return PDO the PDO instance, null if the connection is not established yet
	 */
	public function getPdoInstance()
	{
		return $this->_pdo;
	}

	/**
	 * Creates a command for execution.
	 * @param string $sql SQL statement associated with the new command.
	 * @return CDbCommand the DB command
	 * @throws CException if the connection is not active
	 */
	public function createCommand($sql)
	{
		if($this->getActive())
			return new CDbCommand($this,$sql);
		else
			throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * @return CDbTransaction the currently active transaction. Null if no active transaction.
	 */
	public function getCurrentTransaction()
	{
		if($this->_transaction!==null)
		{
			if($this->_transaction->getActive())
				return $this->_transaction;
		}
		return null;
	}

	/**
	 * Starts a transaction.
	 * @return CDbTransaction the transaction initiated
	 * @throws CException if the connection is not active
	 */
	public function beginTransaction()
	{
		if($this->getActive())
		{
			$this->_pdo->beginTransaction();
			return $this->_transaction=new CDbTransaction($this);
		}
		else
			throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * @return CDbSchema the database schema for the current connection
	 * @throws CException if the connection is not active yet
	 */
	public function getSchema()
	{
		if($this->_schema!==null)
			return $this->_schema;
		else
		{
			if(!$this->getActive())
				throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
			$driver=$this->getDriverName();
			switch(strtolower($driver))
			{
				case 'pgsql':  // PostgreSQL
					return $this->_schema=new CPgsqlSchema($this);
				case 'mysqli': // MySQL
				case 'mysql':
					return $this->_schema=new CMysqlSchema($this);
				case 'sqlite': // sqlite 3
				case 'sqlite2': // sqlite 2
					return $this->_schema=new CSqliteSchema($this);
				case 'mssql': // Mssql driver on windows hosts
				case 'dblib': // dblib drivers on linux (and maybe others os) hosts
				case 'sqlsrv':
					return $this->_schema=new CMssqlSchema($this);
				case 'oci':  // Oracle driver
					return $this->_schema=new COciSchema($this);
				case 'ibm':
				default:
					throw new CDbException(Yii::t('yii','CDbConnection does not support reading schema for {driver} database.',
						array('{driver}'=>$driver)));
			}
		}
	}

	/**
	 * Returns the SQL command builder for the current DB connection.
	 * @return CDbCommandBuilder the command builder
	 * @since 1.0.4
	 */
	public function getCommandBuilder()
	{
		return $this->getSchema()->getCommandBuilder();
	}

	/**
	 * Returns the ID of the last inserted row or sequence value.
	 * @param string $sequenceName name of the sequence object (required by some DBMS)
	 * @return string the row ID of the last row inserted, or the last value retrieved from the sequence object
	 * @see http://www.php.net/manual/en/function.PDO-lastInsertId.php
	 */
	public function getLastInsertID($sequenceName='')
	{
		if($this->getActive())
			return $this->_pdo->lastInsertId($sequenceName);
		else
			throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Quotes a string value for use in a query.
	 * @param string $str string to be quoted
	 * @return string the properly quoted string
	 * @see http://www.php.net/manual/en/function.PDO-quote.php
	 */
	public function quoteValue($str)
	{
		if($this->getActive())
			return $this->_pdo->quote($str);
		else
			throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Quotes a table name for use in a query.
	 * @param string $name table name
	 * @return string the properly quoted table name
	 */
	public function quoteTableName($name)
	{
		return $this->getSchema()->quoteTableName($name);
	}

	/**
	 * Quotes a column name for use in a query.
	 * @param string $name column name
	 * @return string the properly quoted column name
	 */
	public function quoteColumnName($name)
	{
		return $this->getSchema()->quoteColumnName($name);
	}

	/**
	 * Determines the PDO type for the specified PHP type.
	 * @param string $type The PHP type (obtained by gettype() call).
	 * @return integer the corresponding PDO type
	 */
	public function getPdoType($type)
	{
		static $map=array
		(
			'boolean'=>PDO::PARAM_BOOL,
			'integer'=>PDO::PARAM_INT,
			'string'=>PDO::PARAM_STR,
			'NULL'=>PDO::PARAM_NULL,
		);
		return isset($map[$type]) ? $map[$type] : PDO::PARAM_STR;
	}

	/**
	 * @return mixed the case of the column names
	 * @see http://www.php.net/manual/en/pdo.setattribute.php
	 */
	public function getColumnCase()
	{
		return $this->getAttribute(PDO::ATTR_CASE);
	}

	/**
	 * @param mixed $value the case of the column names
	 * @see http://www.php.net/manual/en/pdo.setattribute.php
	 */
	public function setColumnCase($value)
	{
		$this->setAttribute(PDO::ATTR_CASE,$value);
	}

	/**
	 * @return mixed how the null and empty strings are converted
	 * @see http://www.php.net/manual/en/pdo.setattribute.php
	 */
	public function getNullConversion()
	{
		return $this->getAttribute(PDO::ATTR_ORACLE_NULLS);
	}

	/**
	 * @param mixed $value how the null and empty strings are converted
	 * @see http://www.php.net/manual/en/pdo.setattribute.php
	 */
	public function setNullConversion($value)
	{
		$this->setAttribute(PDO::ATTR_ORACLE_NULLS,$value);
	}

	/**
	 * @return boolean whether creating or updating a DB record will be automatically committed.
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getAutoCommit()
	{
		return $this->getAttribute(PDO::ATTR_AUTOCOMMIT);
	}

	/**
	 * @param boolean $value whether creating or updating a DB record will be automatically committed.
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function setAutoCommit($value)
	{
		$this->setAttribute(PDO::ATTR_AUTOCOMMIT,$value);
	}

	/**
	 * @return boolean whether the connection is persistent or not
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getPersistent()
	{
		return $this->getAttribute(PDO::ATTR_PERSISTENT);
	}

	/**
	 * @param boolean $value whether the connection is persistent or not
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function setPersistent($value)
	{
		return $this->setAttribute(PDO::ATTR_PERSISTENT,$value);
	}

	/**
	 * @return string name of the DB driver
	 */
	public function getDriverName()
	{
		return $this->getAttribute(PDO::ATTR_DRIVER_NAME);
	}

	/**
	 * @return string the version information of the DB driver
	 */
	public function getClientVersion()
	{
		return $this->getAttribute(PDO::ATTR_CLIENT_VERSION);
	}

	/**
	 * @return string the status of the connection
	 * Some DBMS (such as sqlite) may not support this feature.
	 */
	public function getConnectionStatus()
	{
		return $this->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	}

	/**
	 * @return boolean whether the connection performs data prefetching
	 */
	public function getPrefetch()
	{
		return $this->getAttribute(PDO::ATTR_PREFETCH);
	}

	/**
	 * @return string the information of DBMS server
	 */
	public function getServerInfo()
	{
		return $this->getAttribute(PDO::ATTR_SERVER_INFO);
	}

	/**
	 * @return string the version information of DBMS server
	 */
	public function getServerVersion()
	{
		return $this->getAttribute(PDO::ATTR_SERVER_VERSION);
	}

	/**
	 * @return int timeout settings for the connection
	 */
	public function getTimeout()
	{
		return $this->getAttribute(PDO::ATTR_TIMEOUT);
	}

	/**
	 * Obtains a specific DB connection attribute information.
	 * @param int $name the attribute to be queried
	 * @return mixed the corresponding attribute information
	 * @see http://www.php.net/manual/en/function.PDO-getAttribute.php
	 */
	public function getAttribute($name)
	{
		if($this->getActive())
			return $this->_pdo->getAttribute($name);
		else
			throw new CDbException(Yii::t('yii','CDbConnection is inactive and cannot perform any DB operations.'));
	}

	/**
	 * Sets an attribute on the database connection.
	 * @param int $name the attribute to be set
	 * @param mixed $value the attribute value
	 * @see http://www.php.net/manual/en/function.PDO-setAttribute.php
	 */
	public function setAttribute($name,$value)
	{
		if($this->_pdo instanceof PDO)
			$this->_pdo->setAttribute($name,$value);
		else
			$this->_attributes[$name]=$value;
	}

	/**
	 * Returns the statistical results of SQL executions.
	 * The results returned include the number of SQL statements executed and
	 * the total time spent.
	 * In order to use this method, {@link enableProfiling} has to be set true.
	 * @return array the first element indicates the number of SQL statements executed,
	 * and the second element the total time spent in SQL execution.
	 * @since 1.0.6
	 */
	public function getStats()
	{
		$logger=Yii::getLogger();
		$timings=$logger->getProfilingResults(null,'system.db.CDbCommand.query');
		$count=count($timings);
		$time=array_sum($timings);
		$timings=$logger->getProfilingResults(null,'system.db.CDbCommand.execute');
		$count+=count($timings);
		$time+=array_sum($timings);
		return array($count,$time);
	}
}
