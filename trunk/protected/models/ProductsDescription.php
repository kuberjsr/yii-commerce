<?php

/**
 * This is the model class for table "products_description".
 *
 * The followings are the available columns in table 'products_description':
 * @property integer $products_id
 * @property integer $language_id
 * @property string $products_name
 * @property string $products_description
 * @property string $products_url
 * @property integer $products_viewed
 */
class ProductsDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsDescription the static model class
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
		return 'products_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_viewed', 'numerical', 'integerOnly'=>true),
			array('products_name', 'length', 'max'=>64),
			array('products_url', 'length', 'max'=>255),
			array('products_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_id, language_id, products_name, products_description, products_url, products_viewed', 'safe', 'on'=>'search'),
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
			'language_id' => 'Language',
			'products_name' => 'Products Name',
			'products_description' => 'Products Description',
			'products_url' => 'Products Url',
			'products_viewed' => 'Products Viewed',
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
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('products_name',$this->products_name,true);
		$criteria->compare('products_description',$this->products_description,true);
		$criteria->compare('products_url',$this->products_url,true);
		$criteria->compare('products_viewed',$this->products_viewed);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}