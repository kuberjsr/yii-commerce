<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $categories_id
 * @property string $categories_image
 * @property integer $parent_id
 * @property integer $sort_order
 * @property string $date_added
 * @property string $last_modified
 */
class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Categories the static model class
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
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('categories_image', 'length', 'max'=>64),
			array('date_added, last_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('categories_id, categories_image, parent_id, sort_order, date_added, last_modified', 'safe', 'on'=>'search'),
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
			'categories_image' => 'Categories Image',
			'parent_id' => 'Parent',
			'sort_order' => 'Sort Order',
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

		$criteria->compare('categories_id',$this->categories_id);
		$criteria->compare('categories_image',$this->categories_image,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('last_modified',$this->last_modified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}