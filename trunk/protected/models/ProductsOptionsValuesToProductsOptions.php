<?php

/**
 * This is the model class for table "products_options_values_to_products_options".
 *
 * The followings are the available columns in table 'products_options_values_to_products_options':
 * @property integer $products_options_values_to_products_options_id
 * @property integer $products_options_id
 * @property integer $products_options_values_id
 */
class ProductsOptionsValuesToProductsOptions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsOptionsValuesToProductsOptions the static model class
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
		return 'products_options_values_to_products_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_options_id, products_options_values_id', 'required'),
			array('products_options_id, products_options_values_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_options_values_to_products_options_id, products_options_id, products_options_values_id', 'safe', 'on'=>'search'),
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
			'products_options_values_to_products_options_id' => 'Products Options Values To Products Options',
			'products_options_id' => 'Products Options',
			'products_options_values_id' => 'Products Options Values',
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

		$criteria->compare('products_options_values_to_products_options_id',$this->products_options_values_to_products_options_id);
		$criteria->compare('products_options_id',$this->products_options_id);
		$criteria->compare('products_options_values_id',$this->products_options_values_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}