<?php

/**
 * This is the model class for table "specials".
 *
 * The followings are the available columns in table 'specials':
 * @property integer $specials_id
 * @property integer $products_id
 * @property string $specials_new_products_price
 * @property string $specials_date_added
 * @property string $specials_last_modified
 * @property string $expires_date
 * @property string $date_status_change
 * @property integer $status
 */
class Specials extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Specials the static model class
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
		return 'specials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('products_id, specials_new_products_price', 'required'),
			array('products_id, status', 'numerical', 'integerOnly'=>true),
			array('specials_new_products_price', 'length', 'max'=>15),
			array('specials_date_added, specials_last_modified, expires_date, date_status_change', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('specials_id, products_id, specials_new_products_price, specials_date_added, specials_last_modified, expires_date, date_status_change, status', 'safe', 'on'=>'search'),
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
			'specials_id' => 'Specials',
			'products_id' => 'Products',
			'specials_new_products_price' => 'Specials New Products Price',
			'specials_date_added' => 'Specials Date Added',
			'specials_last_modified' => 'Specials Last Modified',
			'expires_date' => 'Expires Date',
			'date_status_change' => 'Date Status Change',
			'status' => 'Status',
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

		$criteria->compare('specials_id',$this->specials_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('specials_new_products_price',$this->specials_new_products_price,true);
		$criteria->compare('specials_date_added',$this->specials_date_added,true);
		$criteria->compare('specials_last_modified',$this->specials_last_modified,true);
		$criteria->compare('expires_date',$this->expires_date,true);
		$criteria->compare('date_status_change',$this->date_status_change,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}