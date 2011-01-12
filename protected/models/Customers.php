<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $customers_id
 * @property string $customers_gender
 * @property string $customers_firstname
 * @property string $customers_lastname
 * @property string $customers_dob
 * @property string $customers_email_address
 * @property integer $customers_default_address_id
 * @property string $customers_telephone
 * @property string $customers_fax
 * @property string $customers_password
 * @property string $customers_newsletter
 */
class Customers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customers the static model class
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
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_gender, customers_firstname, customers_lastname, customers_email_address, customers_telephone, customers_password', 'required'),
			array('customers_default_address_id', 'numerical', 'integerOnly'=>true),
			array('customers_gender, customers_newsletter', 'length', 'max'=>1),
			array('customers_firstname, customers_lastname, customers_telephone, customers_fax', 'length', 'max'=>32),
			array('customers_email_address', 'length', 'max'=>96),
			array('customers_password', 'length', 'max'=>40),
			array('customers_dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customers_id, customers_gender, customers_firstname, customers_lastname, customers_dob, customers_email_address, customers_default_address_id, customers_telephone, customers_fax, customers_password, customers_newsletter', 'safe', 'on'=>'search'),
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
			'customers_id' => 'Customers',
			'customers_gender' => 'Customers Gender',
			'customers_firstname' => 'Customers Firstname',
			'customers_lastname' => 'Customers Lastname',
			'customers_dob' => 'Customers Dob',
			'customers_email_address' => 'Customers Email Address',
			'customers_default_address_id' => 'Customers Default Address',
			'customers_telephone' => 'Customers Telephone',
			'customers_fax' => 'Customers Fax',
			'customers_password' => 'Customers Password',
			'customers_newsletter' => 'Customers Newsletter',
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

		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('customers_gender',$this->customers_gender,true);
		$criteria->compare('customers_firstname',$this->customers_firstname,true);
		$criteria->compare('customers_lastname',$this->customers_lastname,true);
		$criteria->compare('customers_dob',$this->customers_dob,true);
		$criteria->compare('customers_email_address',$this->customers_email_address,true);
		$criteria->compare('customers_default_address_id',$this->customers_default_address_id);
		$criteria->compare('customers_telephone',$this->customers_telephone,true);
		$criteria->compare('customers_fax',$this->customers_fax,true);
		$criteria->compare('customers_password',$this->customers_password,true);
		$criteria->compare('customers_newsletter',$this->customers_newsletter,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}