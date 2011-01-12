<?php

/**
 * This is the model class for table "newsletters".
 *
 * The followings are the available columns in table 'newsletters':
 * @property integer $newsletters_id
 * @property string $title
 * @property string $content
 * @property string $module
 * @property string $date_added
 * @property string $date_sent
 * @property integer $status
 * @property integer $locked
 */
class Newsletters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Newsletters the static model class
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
		return 'newsletters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, module, date_added', 'required'),
			array('status, locked', 'numerical', 'integerOnly'=>true),
			array('title, module', 'length', 'max'=>255),
			array('date_sent', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('newsletters_id, title, content, module, date_added, date_sent, status, locked', 'safe', 'on'=>'search'),
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
			'newsletters_id' => 'Newsletters',
			'title' => 'Title',
			'content' => 'Content',
			'module' => 'Module',
			'date_added' => 'Date Added',
			'date_sent' => 'Date Sent',
			'status' => 'Status',
			'locked' => 'Locked',
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

		$criteria->compare('newsletters_id',$this->newsletters_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('date_sent',$this->date_sent,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('locked',$this->locked);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}