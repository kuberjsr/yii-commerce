<?php

/**
 * This is the model class for table "customers_info".
 *
 * The followings are the available columns in table 'customers_info':
 * @property integer $customers_info_id
 * @property string $customers_info_date_of_last_logon
 * @property integer $customers_info_number_of_logons
 * @property string $customers_info_date_account_created
 * @property string $customers_info_date_account_last_modified
 * @property integer $global_product_notifications
 */
class CustomersInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CustomersInfo the static model class
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
		return 'customers_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_info_id', 'required'),
			array('customers_info_id, customers_info_number_of_logons, global_product_notifications', 'numerical', 'integerOnly'=>true),
			array('customers_info_date_of_last_logon, customers_info_date_account_created, customers_info_date_account_last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customers_info_id, customers_info_date_of_last_logon, customers_info_number_of_logons, customers_info_date_account_created, customers_info_date_account_last_modified, global_product_notifications', 'safe', 'on'=>'search'),
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
			'customers_info_id' => 'Customers Info',
			'customers_info_date_of_last_logon' => 'Customers Info Date Of Last Logon',
			'customers_info_number_of_logons' => 'Customers Info Number Of Logons',
			'customers_info_date_account_created' => 'Customers Info Date Account Created',
			'customers_info_date_account_last_modified' => 'Customers Info Date Account Last Modified',
			'global_product_notifications' => 'Global Product Notifications',
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

		$criteria->compare('customers_info_id',$this->customers_info_id);
		$criteria->compare('customers_info_date_of_last_logon',$this->customers_info_date_of_last_logon,true);
		$criteria->compare('customers_info_number_of_logons',$this->customers_info_number_of_logons);
		$criteria->compare('customers_info_date_account_created',$this->customers_info_date_account_created,true);
		$criteria->compare('customers_info_date_account_last_modified',$this->customers_info_date_account_last_modified,true);
		$criteria->compare('global_product_notifications',$this->global_product_notifications);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}