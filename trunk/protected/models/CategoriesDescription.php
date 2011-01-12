<?php

/**
 * This is the model class for table "categories_description".
 *
 * The followings are the available columns in table 'categories_description':
 * @property integer $categories_id
 * @property integer $language_id
 * @property string $categories_name
 */
class CategoriesDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CategoriesDescription the static model class
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
		return 'categories_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categories_name', 'required'),
			array('categories_id, language_id', 'numerical', 'integerOnly'=>true),
			array('categories_name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('categories_id, language_id, categories_name', 'safe', 'on'=>'search'),
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
			'categories_id' => 'Categories',
			'language_id' => 'Language',
			'categories_name' => 'Categories Name',
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

		$criteria->compare('categories_id',$this->categories_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('categories_name',$this->categories_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}