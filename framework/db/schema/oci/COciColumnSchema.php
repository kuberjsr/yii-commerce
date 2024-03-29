<?php
/**
 * COciColumnSchema class file.
 *
 * @author Ricardo Grana <rickgrana@yahoo.com.br>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2010 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * COciColumnSchema class describes the column meta data of a Oracle table.
 *
 * @author Ricardo Grana <rickgrana@yahoo.com.br>
 * @version $Id: COciColumnSchema.php 2497 2010-09-23 13:28:52Z mdomba $
 * @package system.db.schema.oci
 * @since 1.0.5
 */
class COciColumnSchema extends CDbColumnSchema
{
	/**
	 * Extracts the PHP type from DB type.
	 * @param string $dbType DB type
	 */
	protected function extractOraType($dbType){
		if(strpos($dbType,'FLOAT')!==false) return 'double';

		if (strpos($dbType,'NUMBER')!==false || strpos($dbType,'INTEGER')!==false)
		{
			if(strpos($dbType,'(') && preg_match('/\((.*)\)/',$dbType,$matches))
			{
				$values=explode(',',$matches[1]);
				if(isset($values[1]) and (((int)$values[1]) > 0))
					return 'double';
				else
					return 'integer';
			}
			else
				return 'double';
		}
		else
			return 'string';
	}

	/**
	 * Extracts the PHP type from DB type.
	 * @param string $dbType DB type
	 */
	protected function extractType($dbType)
	{
		$this->type=$this->extractOraType($dbType);
	}

	/*
	 * Extracts the default value for the column.
	 * The value is typecasted to correct PHP type.
	 * @param mixed $defaultValue the default value obtained from metadata
	 */
	protected function extractDefault($defaultValue)
	{
		if(stripos($defaultValue,'timestamp')!==false)
			$this->defaultValue=null;
		else
			parent::extractDefault($defaultValue);
	}
}
