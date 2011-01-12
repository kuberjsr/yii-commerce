<?php

/**
 * This is the model class for table "orders_products".
 *
 * The followings are the available columns in table 'orders_products':
 * @property integer $orders_products_id
 * @property integer $orders_id
 * @property integer $products_id
 * @property string $products_model
 * @property string $products_name
 * @property string $products_price
 * @property string $final_price
 * @property string $products_tax
 * @property integer $products_quantity
 */
class OrdersProducts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersProducts the static model class
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
		return 'orders_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id, products_id, products_name, products_price, final_price, products_tax, products_quantity', 'required'),
			array('orders_id, products_id, products_quantity', 'numerical', 'integerOnly'=>true),
			array('products_model', 'length', 'max'=>12),
			array('products_name', 'length', 'max'=>64),
			array('products_price, final_price', 'length', 'max'=>15),
			array('products_tax', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_products_id, orders_id, products_id, products_model, products_name, products_price, final_price, products_tax, products_quantity', 'safe', 'on'=>'search'),
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
			'orders_products_id' => 'Orders Products',
			'orders_id' => 'Orders',
			'products_id' => 'Products',
			'products_model' => 'Products Model',
			'products_name' => 'Products Name',
			'products_price' => 'Products Price',
			'final_price' => 'Final Price',
			'products_tax' => 'Products Tax',
			'products_quantity' => 'Products Quantity',
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

		$criteria->compare('orders_products_id',$this->orders_products_id);
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('products_model',$this->products_model,true);
		$criteria->compare('products_name',$this->products_name,true);
		$criteria->compare('products_price',$this->products_price,true);
		$criteria->compare('final_price',$this->final_price,true);
		$criteria->compare('products_tax',$this->products_tax,true);
		$criteria->compare('products_quantity',$this->products_quantity);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}