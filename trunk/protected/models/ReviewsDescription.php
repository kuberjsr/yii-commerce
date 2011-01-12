<?php

/**
 * This is the model class for table "reviews_description".
 *
 * The followings are the available columns in table 'reviews_description':
 * @property integer $reviews_id
 * @property integer $languages_id
 * @property string $reviews_text
 */
class ReviewsDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ReviewsDescription the static model class
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
		return 'reviews_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reviews_id, languages_id, reviews_text', 'required'),
			array('reviews_id, languages_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('reviews_id, languages_id, reviews_text', 'safe', 'on'=>'search'),
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
			'reviews_id' => 'Reviews',
			'languages_id' => 'Languages',
			'reviews_text' => 'Reviews Text',
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

		$criteria->compare('reviews_id',$this->reviews_id);
		$criteria->compare('languages_id',$this->languages_id);
		$criteria->compare('reviews_text',$this->reviews_text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}