<?php

/**
 * This is the model class for table "address_format".
 *
 * The followings are the available columns in table 'address_format':
 * @property integer $address_format_id
 * @property string $address_format
 * @property string $address_summary
 */
class AddressFormat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AddressFormat the static model class
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
		return 'address_format';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address_format, address_summary', 'required'),
			array('address_format', 'length', 'max'=>128),
			array('address_summary', 'length', 'max'=>48),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_format_id, address_format, address_summary', 'safe', 'on'=>'search'),
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
			'address_format_id' => 'Address Format',
			'address_format' => 'Address Format',
			'address_summary' => 'Address Summary',
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

		$criteria->compare('address_format_id',$this->address_format_id);
		$criteria->compare('address_format',$this->address_format,true);
		$criteria->compare('address_summary',$this->address_summary,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}