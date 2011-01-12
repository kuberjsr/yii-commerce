<?php

/**
 * This is the model class for table "configuration_group".
 *
 * The followings are the available columns in table 'configuration_group':
 * @property integer $configuration_group_id
 * @property string $configuration_group_title
 * @property string $configuration_group_description
 * @property integer $sort_order
 * @property integer $visible
 */
class ConfigurationGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfigurationGroup the static model class
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
		return 'configuration_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('configuration_group_title, configuration_group_description', 'required'),
			array('sort_order, visible', 'numerical', 'integerOnly'=>true),
			array('configuration_group_title', 'length', 'max'=>64),
			array('configuration_group_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible', 'safe', 'on'=>'search'),
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
			'configuration_group_id' => 'Configuration Group',
			'configuration_group_title' => 'Configuration Group Title',
			'configuration_group_description' => 'Configuration Group Description',
			'sort_order' => 'Sort Order',
			'visible' => 'Visible',
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

		$criteria->compare('configuration_group_id',$this->configuration_group_id);
		$criteria->compare('configuration_group_title',$this->configuration_group_title,true);
		$criteria->compare('configuration_group_description',$this->configuration_group_description,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}