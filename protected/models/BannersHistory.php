<?php

/**
 * This is the model class for table "banners_history".
 *
 * The followings are the available columns in table 'banners_history':
 * @property integer $banners_history_id
 * @property integer $banners_id
 * @property integer $banners_shown
 * @property integer $banners_clicked
 * @property string $banners_history_date
 */
class BannersHistory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BannersHistory the static model class
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
		return 'banners_history';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('banners_id, banners_history_date', 'required'),
			array('banners_id, banners_shown, banners_clicked', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('banners_history_id, banners_id, banners_shown, banners_clicked, banners_history_date', 'safe', 'on'=>'search'),
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
			'banners_history_id' => 'Banners History',
			'banners_id' => 'Banners',
			'banners_shown' => 'Banners Shown',
			'banners_clicked' => 'Banners Clicked',
			'banners_history_date' => 'Banners History Date',
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

		$criteria->compare('banners_history_id',$this->banners_history_id);
		$criteria->compare('banners_id',$this->banners_id);
		$criteria->compare('banners_shown',$this->banners_shown);
		$criteria->compare('banners_clicked',$this->banners_clicked);
		$criteria->compare('banners_history_date',$this->banners_history_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}