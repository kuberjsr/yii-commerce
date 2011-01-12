<?php

/**
 * This is the model class for table "orders_products_attributes".
 *
 * The followings are the available columns in table 'orders_products_attributes':
 * @property integer $orders_products_attributes_id
 * @property integer $orders_id
 * @property integer $orders_products_id
 * @property string $products_options
 * @property string $products_options_values
 * @property string $options_values_price
 * @property string $price_prefix
 */
class OrdersProductsAttributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersProductsAttributes the static model class
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
		return 'orders_products_attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id, orders_products_id, products_options, products_options_values, options_values_price, price_prefix', 'required'),
			array('orders_id, orders_products_id', 'numerical', 'integerOnly'=>true),
			array('products_options, products_options_values', 'length', 'max'=>32),
			array('options_values_price', 'length', 'max'=>15),
			array('price_prefix', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_products_attributes_id, orders_id, orders_products_id, products_options, products_options_values, options_values_price, price_prefix', 'safe', 'on'=>'search'),
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
			'orders_products_attributes_id' => 'Orders Products Attributes',
			'orders_id' => 'Orders',
			'orders_products_id' => 'Orders Products',
			'products_options' => 'Products Options',
			'products_options_values' => 'Products Options Values',
			'options_values_price' => 'Options Values Price',
			'price_prefix' => 'Price Prefix',
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

		$criteria->compare('orders_products_attributes_id',$this->orders_products_attributes_id);
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('orders_products_id',$this->orders_products_id);
		$criteria->compare('products_options',$this->products_options,true);
		$criteria->compare('products_options_values',$this->products_options_values,true);
		$criteria->compare('options_values_price',$this->options_values_price,true);
		$criteria->compare('price_prefix',$this->price_prefix,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}