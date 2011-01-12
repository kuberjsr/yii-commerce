<?php

/**
 * This is the model class for table "products_attributes".
 *
 * The followings are the available columns in table 'products_attributes':
 * @property integer $products_attributes_id
 * @property integer $products_id
 * @property integer $options_id
 * @property integer $options_values_id
 * @property string $options_values_price
 * @property string $price_prefix
 */
class ProductsAttributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsAttributes the static model class
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
		return 'products_attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, options_id, options_values_id, options_values_price, price_prefix', 'required'),
			array('products_id, options_id, options_values_id', 'numerical', 'integerOnly'=>true),
			array('options_values_price', 'length', 'max'=>15),
			array('price_prefix', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_attributes_id, products_id, options_id, options_values_id, options_values_price, price_prefix', 'safe', 'on'=>'search'),
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
			'products_attributes_id' => 'Products Attributes',
			'products_id' => 'Products',
			'options_id' => 'Options',
			'options_values_id' => 'Options Values',
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

		$criteria->compare('products_attributes_id',$this->products_attributes_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('options_id',$this->options_id);
		$criteria->compare('options_values_id',$this->options_values_id);
		$criteria->compare('options_values_price',$this->options_values_price,true);
		$criteria->compare('price_prefix',$this->price_prefix,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}