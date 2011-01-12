<?php

/**
 * This is the model class for table "orders_status_history".
 *
 * The followings are the available columns in table 'orders_status_history':
 * @property integer $orders_status_history_id
 * @property integer $orders_id
 * @property integer $orders_status_id
 * @property string $date_added
 * @property integer $customer_notified
 * @property string $comments
 */
class OrdersStatusHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersStatusHistory the static model class
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
		return 'orders_status_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id, orders_status_id, date_added', 'required'),
			array('orders_id, orders_status_id, customer_notified', 'numerical', 'integerOnly'=>true),
			array('comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_status_history_id, orders_id, orders_status_id, date_added, customer_notified, comments', 'safe', 'on'=>'search'),
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
			'orders_status_history_id' => 'Orders Status History',
			'orders_id' => 'Orders',
			'orders_status_id' => 'Orders Status',
			'date_added' => 'Date Added',
			'customer_notified' => 'Customer Notified',
			'comments' => 'Comments',
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

		$criteria->compare('orders_status_history_id',$this->orders_status_history_id);
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('orders_status_id',$this->orders_status_id);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('customer_notified',$this->customer_notified);
		$criteria->compare('comments',$this->comments,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}