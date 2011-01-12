<?php

/**
 * This is the model class for table "configuration".
 *
 * The followings are the available columns in table 'configuration':
 * @property integer $configuration_id
 * @property string $configuration_title
 * @property string $configuration_key
 * @property string $configuration_value
 * @property string $configuration_description
 * @property integer $configuration_group_id
 * @property integer $sort_order
 * @property string $last_modified
 * @property string $date_added
 * @property string $use_function
 * @property string $set_function
 */
class Configuration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Configuration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added', 'required'),
			array('configuration_group_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('configuration_title, configuration_key', 'length', 'max'=>64),
			array('configuration_value, configuration_description, use_function, set_function', 'length', 'max'=>255),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'configuration_id' => 'Configuration',
			'configuration_title' => 'Configuration Title',
			'configuration_key' => 'Configuration Key',
			'configuration_value' => 'Configuration Value',
			'configuration_description' => 'Configuration Description',
			'configuration_group_id' => 'Configuration Group',
			'sort_order' => 'Sort Order',
			'last_modified' => 'Last Modified',
			'date_added' => 'Date Added',
			'use_function' => 'Use Function',
			'set_function' => 'Set Function',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('configuration_id',$this->configuration_id);
		$criteria->compare('configuration_title',$this->configuration_title,true);
		$criteria->compare('configuration_key',$this->configuration_key,true);
		$criteria->compare('configuration_value',$this->configuration_value,true);
		$criteria->compare('configuration_description',$this->configuration_description,true);
		$criteria->compare('configuration_group_id',$this->configuration_group_id);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('use_function',$this->use_function,true);
		$criteria->compare('set_function',$this->set_function,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}