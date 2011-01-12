<?php

/**
 * This is the model class for table "orders_total".
 *
 * The followings are the available columns in table 'orders_total':
 * @property string $orders_total_id
 * @property integer $orders_id
 * @property string $title
 * @property string $text
 * @property string $value
 * @property string $class
 * @property integer $sort_order
 */
class OrdersTotal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersTotal the static model class
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
		return 'orders_total';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id, title, text, value, class, sort_order', 'required'),
			array('orders_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('title, text', 'length', 'max'=>255),
			array('value', 'length', 'max'=>15),
			array('class', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_total_id, orders_id, title, text, value, class, sort_order', 'safe', 'on'=>'search'),
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
			'orders_total_id' => 'Orders Total',
			'orders_id' => 'Orders',
			'title' => 'Title',
			'text' => 'Text',
			'value' => 'Value',
			'class' => 'Class',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('orders_total_id',$this->orders_total_id,true);
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}