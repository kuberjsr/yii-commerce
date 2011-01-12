<?php

/**
 * This is the model class for table "orders_status".
 *
 * The followings are the available columns in table 'orders_status':
 * @property integer $orders_status_id
 * @property integer $language_id
 * @property string $orders_status_name
 */
class OrdersStatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersStatus the static model class
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
		return 'orders_status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_status_name', 'required'),
			array('orders_status_id, language_id', 'numerical', 'integerOnly'=>true),
			array('orders_status_name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_status_id, language_id, orders_status_name', 'safe', 'on'=>'search'),
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
			'orders_status_id' => 'Orders Status',
			'language_id' => 'Language',
			'orders_status_name' => 'Orders Status Name',
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

		$criteria->compare('orders_status_id',$this->orders_status_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('orders_status_name',$this->orders_status_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}