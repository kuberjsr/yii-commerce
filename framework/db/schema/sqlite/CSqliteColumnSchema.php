<?php
/**
 * CSqliteColumnSchema class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CSqliteColumnSchema class describes the column meta data of a SQLite table.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CSqliteColumnSchema.php 2648 2010-11-12 22:12:29Z qiang.xue $
 * @package system.db.schema.sqlite
 * @since 1.0
 */
class CSqliteColumnSchema extends CDbColumnSchema
{
	/**
	 * Extracts the default value for the column.
	 * The value is typecasted to correct PHP type.
	 * @param mixed $defaultValue the default value obtained from metadata
	 */
	protected function extractDefault($defaultValue)
	{
		if($this->type==='string') // PHP 5.2.6 adds single quotes while 5.2.0 doesn't
			$this->defaultValue=trim($defaultValue,"'\"");
		else
			$this->defaultValue=$this->typecast(strcasecmp($defaultValue,'null') ? $defaultValue : null);
	}
}
