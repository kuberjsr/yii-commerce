<?php

/**
 * This is the model class for table "tax_rates".
 *
 * The followings are the available columns in table 'tax_rates':
 * @property integer $tax_rates_id
 * @property integer $tax_zone_id
 * @property integer $tax_class_id
 * @property integer $tax_priority
 * @property string $tax_rate
 * @property string $tax_description
 * @property string $last_modified
 * @property string $date_added
 */
class TaxRates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TaxRates the static model class
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
		return 'tax_rates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax_zone_id, tax_class_id, tax_rate, tax_description, date_added', 'required'),
			array('tax_zone_id, tax_class_id, tax_priority', 'numerical', 'integerOnly'=>true),
			array('tax_rate', 'length', 'max'=>7),
			array('tax_description', 'length', 'max'=>255),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tax_rates_id, tax_zone_id, tax_class_id, tax_priority, tax_rate, tax_description, last_modified, date_added', 'safe', 'on'=>'search'),
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
			'tax_rates_id' => 'Tax Rates',
			'tax_zone_id' => 'Tax Zone',
			'tax_class_id' => 'Tax Class',
			'tax_priority' => 'Tax Priority',
			'tax_rate' => 'Tax Rate',
			'tax_description' => 'Tax Description',
			'last_modified' => 'Last Modified',
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

		$criteria->compare('tax_rates_id',$this->tax_rates_id);
		$criteria->compare('tax_zone_id',$this->tax_zone_id);
		$criteria->compare('tax_class_id',$this->tax_class_id);
		$criteria->compare('tax_priority',$this->tax_priority);
		$criteria->compare('tax_rate',$this->tax_rate,true);
		$criteria->compare('tax_description',$this->tax_description,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}