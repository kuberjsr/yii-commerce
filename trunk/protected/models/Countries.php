<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property integer $countries_id
 * @property string $countries_name
 * @property string $countries_iso_code_2
 * @property string $countries_iso_code_3
 * @property integer $address_format_id
 */
class Countries extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Countries the static model class
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
		return 'countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id', 'required'),
			array('address_format_id', 'numerical', 'integerOnly'=>true),
			array('countries_name', 'length', 'max'=>64),
			array('countries_iso_code_2', 'length', 'max'=>2),
			array('countries_iso_code_3', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('countries_id, countries_name, countries_iso_code_2, countries_iso_code_3, address_format_id', 'safe', 'on'=>'search'),
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
			'countries_id' => 'Countries',
			'countries_name' => 'Countries Name',
			'countries_iso_code_2' => 'Countries Iso Code 2',
			'countries_iso_code_3' => 'Countries Iso Code 3',
			'address_format_id' => 'Address Format',
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

		$criteria->compare('countries_id',$this->countries_id);
		$criteria->compare('countries_name',$this->countries_name,true);
		$criteria->compare('countries_iso_code_2',$this->countries_iso_code_2,true);
		$criteria->compare('countries_iso_code_3',$this->countries_iso_code_3,true);
		$criteria->compare('address_format_id',$this->address_format_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}