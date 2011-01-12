<?php

/**
 * This is the model class for table "geo_zones".
 *
 * The followings are the available columns in table 'geo_zones':
 * @property integer $geo_zone_id
 * @property string $geo_zone_name
 * @property string $geo_zone_description
 * @property string $last_modified
 * @property string $date_added
 */
class GeoZones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GeoZones the static model class
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
		return 'geo_zones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('geo_zone_name, geo_zone_description, date_added', 'required'),
			array('geo_zone_name', 'length', 'max'=>32),
			array('geo_zone_description', 'length', 'max'=>255),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('geo_zone_id, geo_zone_name, geo_zone_description, last_modified, date_added', 'safe', 'on'=>'search'),
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
			'geo_zone_id' => 'Geo Zone',
			'geo_zone_name' => 'Geo Zone Name',
			'geo_zone_description' => 'Geo Zone Description',
			'last_modified' => 'Last Modified',
			'date_added' => 'Date Added',
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

		$criteria->compare('geo_zone_id',$this->geo_zone_id);
		$criteria->compare('geo_zone_name',$this->geo_zone_name,true);
		$criteria->compare('geo_zone_description',$this->geo_zone_description,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}