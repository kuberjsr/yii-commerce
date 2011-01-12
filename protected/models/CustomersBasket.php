<?php

/**
 * This is the model class for table "customers_basket".
 *
 * The followings are the available columns in table 'customers_basket':
 * @property integer $customers_basket_id
 * @property integer $customers_id
 * @property string $products_id
 * @property integer $customers_basket_quantity
 * @property string $final_price
 * @property string $customers_basket_date_added
 */
class CustomersBasket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CustomersBasket the static model class
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
		return 'customers_basket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customers_id, products_id, customers_basket_quantity', 'required'),
			array('customers_id, customers_basket_quantity', 'numerical', 'integerOnly'=>true),
			array('final_price', 'length', 'max'=>15),
			array('customers_basket_date_added', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customers_basket_id, customers_id, products_id, customers_basket_quantity, final_price, customers_basket_date_added', 'safe', 'on'=>'search'),
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
			'customers_basket_id' => 'Customers Basket',
			'customers_id' => 'Customers',
			'products_id' => 'Products',
			'customers_basket_quantity' => 'Customers Basket Quantity',
			'final_price' => 'Final Price',
			'customers_basket_date_added' => 'Customers Basket Date Added',
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

		$criteria->compare('customers_basket_id',$this->customers_basket_id);
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('products_id',$this->products_id,true);
		$criteria->compare('customers_basket_quantity',$this->customers_basket_quantity);
		$criteria->compare('final_price',$this->final_price,true);
		$criteria->compare('customers_basket_date_added',$this->customers_basket_date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}