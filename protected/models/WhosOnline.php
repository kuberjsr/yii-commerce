<?php

/**
 * This is the model class for table "whos_online".
 *
 * The followings are the available columns in table 'whos_online':
 * @property integer $customer_id
 * @property string $full_name
 * @property string $session_id
 * @property string $ip_address
 * @property string $time_entry
 * @property string $time_last_click
 * @property string $last_page_url
 */
class WhosOnline extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return WhosOnline the static model class
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
		return 'whos_online';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, session_id, ip_address, time_entry, time_last_click, last_page_url', 'required'),
			array('customer_id', 'numerical', 'integerOnly'=>true),
			array('full_name', 'length', 'max'=>64),
			array('session_id', 'length', 'max'=>128),
			array('ip_address', 'length', 'max'=>15),
			array('time_entry, time_last_click', 'length', 'max'=>14),
			array('last_page_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_id, full_name, session_id, ip_address, time_entry, time_last_click, last_page_url', 'safe', 'on'=>'search'),
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
			'customer_id' => 'Customer',
			'full_name' => 'Full Name',
			'session_id' => 'Session',
			'ip_address' => 'Ip Address',
			'time_entry' => 'Time Entry',
			'time_last_click' => 'Time Last Click',
			'last_page_url' => 'Last Page Url',
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

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('time_entry',$this->time_entry,true);
		$criteria->compare('time_last_click',$this->time_last_click,true);
		$criteria->compare('last_page_url',$this->last_page_url,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}