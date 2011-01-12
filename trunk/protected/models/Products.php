<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $products_id
 * @property integer $products_quantity
 * @property string $products_model
 * @property string $products_image
 * @property string $products_price
 * @property string $products_date_added
 * @property string $products_last_modified
 * @property string $products_date_available
 * @property string $products_weight
 * @property integer $products_status
 * @property integer $products_tax_class_id
 * @property integer $manufacturers_id
 * @property integer $products_ordered
 */
class Products extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Products the static model class
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
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_quantity, products_price, products_date_added, products_weight, products_status, products_tax_class_id', 'required'),
			array('products_quantity, products_status, products_tax_class_id, manufacturers_id, products_ordered', 'numerical', 'integerOnly'=>true),
			array('products_model', 'length', 'max'=>12),
			array('products_image', 'length', 'max'=>64),
			array('products_price', 'length', 'max'=>15),
			array('products_weight', 'length', 'max'=>5),
			array('products_last_modified, products_date_available', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_id, products_quantity, products_model, products_image, products_price, products_date_added, products_last_modified, products_date_available, products_weight, products_status, products_tax_class_id, manufacturers_id, products_ordered', 'safe', 'on'=>'search'),
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
			'products_id' => 'Products',
			'products_quantity' => 'Products Quantity',
			'products_model' => 'Products Model',
			'products_image' => 'Products Image',
			'products_price' => 'Products Price',
			'products_date_added' => 'Products Date Added',
			'products_last_modified' => 'Products Last Modified',
			'products_date_available' => 'Products Date Available',
			'products_weight' => 'Products Weight',
			'products_status' => 'Products Status',
			'products_tax_class_id' => 'Products Tax Class',
			'manufacturers_id' => 'Manufacturers',
			'products_ordered' => 'Products Ordered',
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

		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('products_quantity',$this->products_quantity);
		$criteria->compare('products_model',$this->products_model,true);
		$criteria->compare('products_image',$this->products_image,true);
		$criteria->compare('products_price',$this->products_price,true);
		$criteria->compare('products_date_added',$this->products_date_added,true);
		$criteria->compare('products_last_modified',$this->products_last_modified,true);
		$criteria->compare('products_date_available',$this->products_date_available,true);
		$criteria->compare('products_weight',$this->products_weight,true);
		$criteria->compare('products_status',$this->products_status);
		$criteria->compare('products_tax_class_id',$this->products_tax_class_id);
		$criteria->compare('manufacturers_id',$this->manufacturers_id);
		$criteria->compare('products_ordered',$this->products_ordered);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}