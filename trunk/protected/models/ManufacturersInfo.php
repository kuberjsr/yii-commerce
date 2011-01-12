<?php

/**
 * This is the model class for table "manufacturers_info".
 *
 * The followings are the available columns in table 'manufacturers_info':
 * @property integer $manufacturers_id
 * @property integer $languages_id
 * @property string $manufacturers_url
 * @property integer $url_clicked
 * @property string $date_last_click
 */
class ManufacturersInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ManufacturersInfo the static model class
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
		return 'manufacturers_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manufacturers_id, languages_id, manufacturers_url', 'required'),
			array('manufacturers_id, languages_id, url_clicked', 'numerical', 'integerOnly'=>true),
			array('manufacturers_url', 'length', 'max'=>255),
			array('date_last_click', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('manufacturers_id, languages_id, manufacturers_url, url_clicked, date_last_click', 'safe', 'on'=>'search'),
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
			'manufacturers_id' => 'Manufacturers',
			'languages_id' => 'Languages',
			'manufacturers_url' => 'Manufacturers Url',
			'url_clicked' => 'Url Clicked',
			'date_last_click' => 'Date Last Click',
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

		$criteria->compare('manufacturers_id',$this->manufacturers_id);
		$criteria->compare('languages_id',$this->languages_id);
		$criteria->compare('manufacturers_url',$this->manufacturers_url,true);
		$criteria->compare('url_clicked',$this->url_clicked);
		$criteria->compare('date_last_click',$this->date_last_click,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}