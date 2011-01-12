<?php

/**
 * This is the model class for table "tax_class".
 *
 * The followings are the available columns in table 'tax_class':
 * @property integer $tax_class_id
 * @property string $tax_class_title
 * @property string $tax_class_description
 * @property string $last_modified
 * @property string $date_added
 */
class TaxClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TaxClass the static model class
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
		return 'tax_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax_class_title, tax_class_description, date_added', 'required'),
			array('tax_class_title', 'length', 'max'=>32),
			array('tax_class_description', 'length', 'max'=>255),
			array('last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tax_class_id, tax_class_title, tax_class_description, last_modified, date_added', 'safe', 'on'=>'search'),
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
			'tax_class_id' => 'Tax Class',
			'tax_class_title' => 'Tax Class Title',
			'tax_class_description' => 'Tax Class Description',
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

		$criteria->compare('tax_class_id',$this->tax_class_id);
		$criteria->compare('tax_class_title',$this->tax_class_title,true);
		$criteria->compare('tax_class_description',$this->tax_class_description,true);
		$criteria->compare('last_modified',$this->last_modified,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}