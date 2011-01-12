<?php

/**
 * This is the model class for table "customers_basket_attributes".
 *
 * The followings are the available columns in table 'customers_basket_attributes':
 * @property integer $customers_basket_attributes_id
 * @property integer $customers_id
 * @property string $products_id
 * @property integer $products_options_id
 * @property integer $products_options_value_id
 */
class CustomersBasketAttributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CustomersBasketAttributes the static model class
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
		return 'customers_basket_attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_id, products_id, products_options_id, products_options_value_id', 'required'),
			array('customers_id, products_options_id, products_options_value_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customers_basket_attributes_id, customers_id, products_id, products_options_id, products_options_value_id', 'safe', 'on'=>'search'),
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
			'customers_basket_attributes_id' => 'Customers Basket Attributes',
			'customers_id' => 'Customers',
			'products_id' => 'Products',
			'products_options_id' => 'Products Options',
			'products_options_value_id' => 'Products Options Value',
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

		$criteria->compare('customers_basket_attributes_id',$this->customers_basket_attributes_id);
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('products_id',$this->products_id,true);
		$criteria->compare('products_options_id',$this->products_options_id);
		$criteria->compare('products_options_value_id',$this->products_options_value_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}