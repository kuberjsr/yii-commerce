<?php

/**
 * This is the model class for table "currencies".
 *
 * The followings are the available columns in table 'currencies':
 * @property integer $currencies_id
 * @property string $title
 * @property string $code
 * @property string $symbol_left
 * @property string $symbol_right
 * @property string $decimal_point
 * @property string $thousands_point
 * @property string $decimal_places
 * @property double $value
 * @property string $last_updated
 */
class Currencies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Currencies the static model class
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
		return 'currencies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, code', 'required'),
			array('value', 'numerical'),
			array('title', 'length', 'max'=>32),
			array('code', 'length', 'max'=>3),
			array('symbol_left, symbol_right', 'length', 'max'=>12),
			array('decimal_point, thousands_point, decimal_places', 'length', 'max'=>1),
			array('last_updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('currencies_id, title, code, symbol_left, symbol_right, decimal_point, thousands_point, decimal_places, value, last_updated', 'safe', 'on'=>'search'),
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
			'currencies_id' => 'Currencies',
			'title' => 'Title',
			'code' => 'Code',
			'symbol_left' => 'Symbol Left',
			'symbol_right' => 'Symbol Right',
			'decimal_point' => 'Decimal Point',
			'thousands_point' => 'Thousands Point',
			'decimal_places' => 'Decimal Places',
			'value' => 'Value',
			'last_updated' => 'Last Updated',
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

		$criteria->compare('currencies_id',$this->currencies_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('symbol_left',$this->symbol_left,true);
		$criteria->compare('symbol_right',$this->symbol_right,true);
		$criteria->compare('decimal_point',$this->decimal_point,true);
		$criteria->compare('thousands_point',$this->thousands_point,true);
		$criteria->compare('decimal_places',$this->decimal_places,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('last_updated',$this->last_updated,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}