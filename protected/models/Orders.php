<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $orders_id
 * @property integer $customers_id
 * @property string $customers_name
 * @property string $customers_company
 * @property string $customers_street_address
 * @property string $customers_suburb
 * @property string $customers_city
 * @property string $customers_postcode
 * @property string $customers_state
 * @property string $customers_country
 * @property string $customers_telephone
 * @property string $customers_email_address
 * @property integer $customers_address_format_id
 * @property string $delivery_name
 * @property string $delivery_company
 * @property string $delivery_street_address
 * @property string $delivery_suburb
 * @property string $delivery_city
 * @property string $delivery_postcode
 * @property string $delivery_state
 * @property string $delivery_country
 * @property integer $delivery_address_format_id
 * @property string $billing_name
 * @property string $billing_company
 * @property string $billing_street_address
 * @property string $billing_suburb
 * @property string $billing_city
 * @property string $billing_postcode
 * @property string $billing_state
 * @property string $billing_country
 * @property integer $billing_address_format_id
 * @property string $payment_method
 * @property string $cc_type
 * @property string $cc_owner
 * @property string $cc_number
 * @property string $cc_expires
 * @property string $last_modified
 * @property string $date_purchased
 * @property integer $orders_status
 * @property string $orders_date_finished
 * @property string $currency
 * @property string $currency_value
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Orders the static model class
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
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_id, customers_name, customers_street_address, customers_city, customers_postcode, customers_country, customers_telephone, customers_email_address, customers_address_format_id, delivery_name, delivery_street_address, delivery_city, delivery_postcode, delivery_country, delivery_address_format_id, billing_name, billing_street_address, billing_city, billing_postcode, billing_country, billing_address_format_id, payment_method, orders_status', 'required'),
			array('customers_id, customers_address_format_id, delivery_address_format_id, billing_address_format_id, orders_status', 'numerical', 'integerOnly'=>true),
			array('customers_name, customers_street_address, delivery_name, delivery_street_address, billing_name, billing_street_address, cc_owner', 'length', 'max'=>64),
			array('customers_company, customers_suburb, customers_city, customers_state, customers_country, customers_telephone, delivery_company, delivery_suburb, delivery_city, delivery_state, delivery_country, billing_company, billing_suburb, billing_city, billing_state, billing_country, payment_method, cc_number', 'length', 'max'=>32),
			array('customers_postcode, delivery_postcode, billing_postcode', 'length', 'max'=>10),
			array('customers_email_address', 'length', 'max'=>96),
			array('cc_type', 'length', 'max'=>20),
			array('cc_expires', 'length', 'max'=>4),
			array('currency', 'length', 'max'=>3),
			array('currency_value', 'length', 'max'=>14),
			array('last_modified, date_purchased, orders_date_finished', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_id, customers_id, customers_name, customers_company, customers_street_address, customers_suburb, customers_city, customers_postcode, customers_state, customers_country, customers_telephone, customers_email_address, customers_address_format_id, delivery_name, delivery_company, delivery_street_address, delivery_suburb, delivery_city, delivery_postcode, delivery_state, delivery_country, delivery_address_format_id, billing_name, billing_company, billing_street_address, billing_suburb, billing_city, billing_postcode, billing_state, billing_country, billing_address_format_id, payment_method, cc_type, cc_owner, cc_number, cc_expires, last_modified, date_purchased, orders_status, orders_date_finished, currency, currency_value', 'safe', 'on'=>'search'),
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
			'orders_id' => 'Orders',
			'customers_id' => 'Customers',
			'customers_name' => 'Customers Name',
			'customers_company' => 'Customers Company',
			'customers_street_address' => 'Customers Street Address',
			'customers_suburb' => 'Customers Suburb',
			'customers_city' => 'Customers City',
			'customers_postcode' => 'Customers Postcode',
			'customers_state' => 'Customers State',
			'customers_country' => 'Customers Country',
			'customers_telephone' => 'Customers Telephone',
			'customers_email_address' => 'Customers Email Address',
			'customers_address_format_id' => 'Customers Address Format',
			'delivery_name' => 'Delivery Name',
			'delivery_company' => 'Delivery Company',
			'delivery_street_address' => 'Delivery Street Address',
			'delivery_suburb' => 'Delivery Suburb',
			'delivery_city' => 'Delivery City',
			'delivery_postcode' => 'Delivery Postcode',
			'delivery_state' => 'Delivery State',
			'delivery_country' => 'Delivery Country',
			'delivery_address_format_id' => 'Delivery Address Format',
			'billing_name' => 'Billing Name',
			'billing_company' => 'Billing Company',
			'billing_street_address' => 'Billing Street Address',
			'billing_suburb' => 'Billing Suburb',
			'billing_city' => 'Billing City',
			'billing_postcode' => 'Billing Postcode',
			'billing_state' => 'Billing State',
			'billing_country' => 'Billing Country',
			'billing_address_format_id' => 'Billing Address Format',
			'payment_method' => 'Payment Method',
			'cc_type' => 'Cc Type',
			'cc_owner' => 'Cc Owner',
			'cc_number' => 'Cc Number',
			'cc_expires' => 'Cc Expires',
			'last_modified' => 'Last Modified',
			'date_purchased' => 'Date Purchased',
			'orders_status' => 'Orders Status',
			'orders_date_finished' => 'Orders Date Finished',
			'currency' => 'Currency',
			'currency_value' => 'Currency Value',
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

		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('customers_name',$this->customers_name,true);
		$criteria->compare('customers_company',$this->customers_company,true);
		$criteria->compare('customers_street_address',$this->customers_street_address,true);
		$criteria->compare('customers_suburb',$this->customers_suburb,true);
		$criteria->compare('customers_city',$this->customers_city,true);
		$criteria->compare('customers_postcode',$this->customers_postcode,true);
		$criteria->compare('customers_state',$this->customers_state,true);
		$criteria->compare('customers_country',$this->customers_country,true);
		$criteria->compare('customers_telephone',$this->customers_telephone,true);
		$criteria->compare('customers_email_address',$this->customers_email_address,true);
		$criteria->compare('customers_address_format_id',$this->customers_address_format_id);
		$criteria->compare('delivery_name',$this->delivery_name,true);
		$criteria->compare('delivery_company',$this->delivery_company,true);
		$criteria->compare('delivery_street_address',$this->delivery_street_address,true);
		$criteria->compare('delivery_suburb',$this->delivery_suburb,true);
		$criteria->compare('delivery_city',$this->delivery_city,true);
		$criteria->compare('delivery_postcode',$this->delivery_postcode,true);
		$criteria->compare('delivery_state',$this->delivery_state,true);
		$criteria->compare('delivery_country',$this->delivery_country,true);
		$criteria->compare('delivery_address_format_id',$this->delivery_address_format_id);
		$criteria->compare('billing_name',$this->billing_name,true);
		$criteria->compare('billing_company',$this->billing_company,true);
		$criteria->compare('billing_street_address',$this->billing_street_address,true);
		$criteria->compare('billing_suburb',$this->billing_suburb,true);
		$criteria->compare('billing_city',$this->billing_city,true);
		$criteria->compare('billing_postcode',$this->billing_postcode,true);
		$criteria->compare('billing_state',$this->billing_state,true);
		$criteria->compare('billing_country',$this->billing_country,true);
		$criteria->compare('billing_address_format_id',$this->billing_address_format_id);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('cc_type',$this->cc_type,true);
		$criteria->compare('cc_owner',$this->cc_owner,true);
		$criteria->compare('cc_number',$this->cc_number,true);
		$criteria->compare('cc_expires',$this->cc_expires,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_purchased',$this->date_purchased,true);
		$criteria->compare('orders_status',$this->orders_status);
		$criteria->compare('orders_date_finished',$this->orders_date_finished,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('currency_value',$this->currency_value,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}