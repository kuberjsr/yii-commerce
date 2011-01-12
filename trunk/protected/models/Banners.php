<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $banners_id
 * @property string $banners_title
 * @property string $banners_url
 * @property string $banners_image
 * @property string $banners_group
 * @property string $banners_html_text
 * @property integer $expires_impressions
 * @property string $expires_date
 * @property string $date_scheduled
 * @property string $date_added
 * @property string $date_status_change
 * @property integer $status
 */
class Banners extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Banners the static model class
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
		return 'banners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('banners_title, banners_url, banners_image, banners_group, date_added', 'required'),
			array('expires_impressions, status', 'numerical', 'integerOnly'=>true),
			array('banners_title, banners_image', 'length', 'max'=>64),
			array('banners_url', 'length', 'max'=>255),
			array('banners_group', 'length', 'max'=>10),
			array('banners_html_text, expires_date, date_scheduled, date_status_change', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('banners_id, banners_title, banners_url, banners_image, banners_group, banners_html_text, expires_impressions, expires_date, date_scheduled, date_added, date_status_change, status', 'safe', 'on'=>'search'),
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
			'banners_id' => 'Banners',
			'banners_title' => 'Banners Title',
			'banners_url' => 'Banners Url',
			'banners_image' => 'Banners Image',
			'banners_group' => 'Banners Group',
			'banners_html_text' => 'Banners Html Text',
			'expires_impressions' => 'Expires Impressions',
			'expires_date' => 'Expires Date',
			'date_scheduled' => 'Date Scheduled',
			'date_added' => 'Date Added',
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

		$criteria->compare('banners_id',$this->banners_id);
		$criteria->compare('banners_title',$this->banners_title,true);
		$criteria->compare('banners_url',$this->banners_url,true);
		$criteria->compare('banners_image',$this->banners_image,true);
		$criteria->compare('banners_group',$this->banners_group,true);
		$criteria->compare('banners_html_text',$this->banners_html_text,true);
		$criteria->compare('expires_impressions',$this->expires_impressions);
		$criteria->compare('expires_date',$this->expires_date,true);
		$criteria->compare('date_scheduled',$this->date_scheduled,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_status_change',$this->date_status_change,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}