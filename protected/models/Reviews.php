<?php

/**
 * This is the model class for table "reviews".
 *
 * The followings are the available columns in table 'reviews':
 * @property integer $reviews_id
 * @property integer $products_id
 * @property integer $customers_id
 * @property string $customers_name
 * @property integer $reviews_rating
 * @property string $date_added
 * @property string $last_modified
 * @property integer $reviews_read
 */
class Reviews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Reviews the static model class
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
		return 'reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, customers_name', 'required'),
			array('products_id, customers_id, reviews_rating, reviews_read', 'numerical', 'integerOnly'=>true),
			array('customers_name', 'length', 'max'=>64),
			array('date_added, last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reviews_id, products_id, customers_id, customers_name, reviews_rating, date_added, last_modified, reviews_read', 'safe', 'on'=>'search'),
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
			'reviews_id' => 'Reviews',
			'products_id' => 'Products',
			'customers_id' => 'Customers',
			'customers_name' => 'Customers Name',
			'reviews_rating' => 'Reviews Rating',
			'date_added' => 'Date Added',
			'last_modified' => 'Last Modified',
			'reviews_read' => 'Reviews Read',
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

		$criteria->compare('reviews_id',$this->reviews_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('customers_name',$this->customers_name,true);
		$criteria->compare('reviews_rating',$this->reviews_rating);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('reviews_read',$this->reviews_read);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}