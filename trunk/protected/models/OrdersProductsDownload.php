<?php

/**
 * This is the model class for table "orders_products_download".
 *
 * The followings are the available columns in table 'orders_products_download':
 * @property integer $orders_products_download_id
 * @property integer $orders_id
 * @property integer $orders_products_id
 * @property string $orders_products_filename
 * @property integer $download_maxdays
 * @property integer $download_count
 */
class OrdersProductsDownload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdersProductsDownload the static model class
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
		return 'orders_products_download';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('orders_id, orders_products_id, download_maxdays, download_count', 'numerical', 'integerOnly'=>true),
			array('orders_products_filename', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('orders_products_download_id, orders_id, orders_products_id, orders_products_filename, download_maxdays, download_count', 'safe', 'on'=>'search'),
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
			'orders_products_download_id' => 'Orders Products Download',
			'orders_id' => 'Orders',
			'orders_products_id' => 'Orders Products',
			'orders_products_filename' => 'Orders Products Filename',
			'download_maxdays' => 'Download Maxdays',
			'download_count' => 'Download Count',
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

		$criteria->compare('orders_products_download_id',$this->orders_products_download_id);
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('orders_products_id',$this->orders_products_id);
		$criteria->compare('orders_products_filename',$this->orders_products_filename,true);
		$criteria->compare('download_maxdays',$this->download_maxdays);
		$criteria->compare('download_count',$this->download_count);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}