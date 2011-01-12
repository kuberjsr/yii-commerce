<?php

/**
 * This is the model class for table "address_book".
 *
 * The followings are the available columns in table 'address_book':
 * @property integer $address_book_id
 * @property integer $customers_id
 * @property string $entry_gender
 * @property string $entry_company
 * @property string $entry_firstname
 * @property string $entry_lastname
 * @property string $entry_street_address
 * @property string $entry_suburb
 * @property string $entry_postcode
 * @property string $entry_city
 * @property string $entry_state
 * @property integer $entry_country_id
 * @property integer $entry_zone_id
 */
class AddressBook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AddressBook the static model class
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
		return 'address_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_id, entry_gender, entry_firstname, entry_lastname, entry_street_address, entry_postcode, entry_city', 'required'),
			array('customers_id, entry_country_id, entry_zone_id', 'numerical', 'integerOnly'=>true),
			array('entry_gender', 'length', 'max'=>1),
			array('entry_company, entry_firstname, entry_lastname, entry_suburb, entry_city, entry_state', 'length', 'max'=>32),
			array('entry_street_address', 'length', 'max'=>64),
			array('entry_postcode', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_book_id, customers_id, entry_gender, entry_company, entry_firstname, entry_lastname, entry_street_address, entry_suburb, entry_postcode, entry_city, entry_state, entry_country_id, entry_zone_id', 'safe', 'on'=>'search'),
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
			'address_book_id' => 'Address Book',
			'customers_id' => 'Customers',
			'entry_gender' => 'Entry Gender',
			'entry_company' => 'Entry Company',
			'entry_firstname' => 'Entry Firstname',
			'entry_lastname' => 'Entry Lastname',
			'entry_street_address' => 'Entry Street Address',
			'entry_suburb' => 'Entry Suburb',
			'entry_postcode' => 'Entry Postcode',
			'entry_city' => 'Entry City',
			'entry_state' => 'Entry State',
			'entry_country_id' => 'Entry Country',
			'entry_zone_id' => 'Entry Zone',
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

		$criteria->compare('address_book_id',$this->address_book_id);
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('entry_gender',$this->entry_gender,true);
		$criteria->compare('entry_company',$this->entry_company,true);
		$criteria->compare('entry_firstname',$this->entry_firstname,true);
		$criteria->compare('entry_lastname',$this->entry_lastname,true);
		$criteria->compare('entry_street_address',$this->entry_street_address,true);
		$criteria->compare('entry_suburb',$this->entry_suburb,true);
		$criteria->compare('entry_postcode',$this->entry_postcode,true);
		$criteria->compare('entry_city',$this->entry_city,true);
		$criteria->compare('entry_state',$this->entry_state,true);
		$criteria->compare('entry_country_id',$this->entry_country_id);
		$criteria->compare('entry_zone_id',$this->entry_zone_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}