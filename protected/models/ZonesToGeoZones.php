<?php

/**
 * This is the model class for table "zones_to_geo_zones".
 *
 * The followings are the available columns in table 'zones_to_geo_zones':
 * @property integer $association_id
 * @property integer $zone_country_id
 * @property integer $zone_id
 * @property integer $geo_zone_id
 * @property string $last_modified
 * @property string $date_added
 */
class ZonesToGeoZones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ZonesToGeoZones the static model class
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
		return 'zones_to_geo_zones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zone_country_id, date_added', 'required'),
			array('zone_country_id, zone_id, geo_zone_id', 'numerical', 'integerOnly'=>true),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('association_id, zone_country_id, zone_id, geo_zone_id, last_modified, date_added', 'safe', 'on'=>'search'),
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
			'association_id' => 'Association',
			'zone_country_id' => 'Zone Country',
			'zone_id' => 'Zone',
			'geo_zone_id' => 'Geo Zone',
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

		$criteria->compare('association_id',$this->association_id);
		$criteria->compare('zone_country_id',$this->zone_country_id);
		$criteria->compare('zone_id',$this->zone_id);
		$criteria->compare('geo_zone_id',$this->geo_zone_id);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}