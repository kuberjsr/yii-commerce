<?php

/**
 * This is the model class for table "products_options".
 *
 * The followings are the available columns in table 'products_options':
 * @property integer $products_options_id
 * @property integer $language_id
 * @property string $products_options_name
 */
class ProductsOptions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsOptions the static model class
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
		return 'products_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_options_id, language_id', 'numerical', 'integerOnly'=>true),
			array('products_options_name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_options_id, language_id, products_options_name', 'safe', 'on'=>'search'),
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
			'products_options_id' => 'Products Options',
			'language_id' => 'Language',
			'products_options_name' => 'Products Options Name',
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

		$criteria->compare('products_options_id',$this->products_options_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('products_options_name',$this->products_options_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}