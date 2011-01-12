<?php

/**
 * This is the model class for table "zones".
 *
 * The followings are the available columns in table 'zones':
 * @property integer $zone_id
 * @property integer $zone_country_id
 * @property string $zone_code
 * @property string $zone_name
 */
class Zones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Zones the static model class
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
		return 'zones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zone_country_id, zone_code, zone_name', 'required'),
			array('zone_country_id', 'numerical', 'integerOnly'=>true),
			array('zone_code, zone_name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('zone_id, zone_country_id, zone_code, zone_name', 'safe', 'on'=>'search'),
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
			'zone_id' => 'Zone',
			'zone_country_id' => 'Zone Country',
			'zone_code' => 'Zone Code',
			'zone_name' => 'Zone Name',
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

		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('zone_country_id',$this->zone_country_id);
		$criteria->compare('zone_code',$this->zone_code,true);
		$criteria->compare('zone_name',$this->zone_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}