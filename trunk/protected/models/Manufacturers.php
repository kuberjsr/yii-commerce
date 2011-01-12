<?php

/**
 * This is the model class for table "manufacturers".
 *
 * The followings are the available columns in table 'manufacturers':
 * @property integer $manufacturers_id
 * @property string $manufacturers_name
 * @property string $manufacturers_image
 * @property string $date_added
 * @property string $last_modified
 */
class Manufacturers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Manufacturers the static model class
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
		return 'manufacturers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('manufacturers_name', 'required'),
			array('manufacturers_name', 'length', 'max'=>32),
			array('manufacturers_image', 'length', 'max'=>64),
			array('date_added, last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('manufacturers_id, manufacturers_name, manufacturers_image, date_added, last_modified', 'safe', 'on'=>'search'),
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
			'manufacturers_id' => 'Manufacturers',
			'manufacturers_name' => 'Manufacturers Name',
			'manufacturers_image' => 'Manufacturers Image',
			'date_added' => 'Date Added',
			'last_modified' => 'Last Modified',
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

		$criteria->compare('manufacturers_id',$this->manufacturers_id);
		$criteria->compare('manufacturers_name',$this->manufacturers_name,true);
		$criteria->compare('manufacturers_image',$this->manufacturers_image,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('last_modified',$this->last_modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}