<?php

/**
 * This is the model class for table "products_notifications".
 *
 * The followings are the available columns in table 'products_notifications':
 * @property integer $products_id
 * @property integer $customers_id
 * @property string $date_added
 */
class ProductsNotifications extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductsNotifications the static model class
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
		return 'products_notifications';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, customers_id, date_added', 'required'),
			array('products_id, customers_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('products_id, customers_id, date_added', 'safe', 'on'=>'search'),
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
			'customers_id' => 'Customers',
			'date_added' => 'Date Added',
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
		$criteria->compare('customers_id',$this->customers_id);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}