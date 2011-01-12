<?php

/**
 * This is the model class for table "products_attributes_download".
 *
 * The followings are the available columns in table 'products_attributes_download':
 * @property integer $products_attributes_id
 * @property string $products_attributes_filename
 * @property integer $products_attributes_maxdays
 * @property integer $products_attributes_maxcount
 */
class ProductsAttributesDownload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsAttributesDownload the static model class
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
		return 'products_attributes_download';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_attributes_id', 'required'),
			array('products_attributes_id, products_attributes_maxdays, products_attributes_maxcount', 'numerical', 'integerOnly'=>true),
			array('products_attributes_filename', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_attributes_id, products_attributes_filename, products_attributes_maxdays, products_attributes_maxcount', 'safe', 'on'=>'search'),
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
			'products_attributes_filename' => 'Products Attributes Filename',
			'products_attributes_maxdays' => 'Products Attributes Maxdays',
			'products_attributes_maxcount' => 'Products Attributes Maxcount',
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
		$criteria->compare('products_attributes_filename',$this->products_attributes_filename,true);
		$criteria->compare('products_attributes_maxdays',$this->products_attributes_maxdays);
		$criteria->compare('products_attributes_maxcount',$this->products_attributes_maxcount);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}