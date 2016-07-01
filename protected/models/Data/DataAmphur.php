<?php

/**
 * This is the model class for table "DataAmphur".
 *
 * The followings are the available columns in table 'DataAmphur':
 * @property integer $AMPHUR_ID
 * @property string $AMPHUR_CODE
 * @property string $AMPHUR_NAME
 * @property string $AMPHUR_NAME_ENG
 * @property integer $GEO_ID
 * @property integer $PROVINCE_ID
 */
class DataAmphur extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'DataAmphur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AMPHUR_CODE, AMPHUR_NAME, AMPHUR_NAME_ENG', 'required'),
			array('GEO_ID, PROVINCE_ID', 'numerical', 'integerOnly'=>true),
			array('AMPHUR_CODE', 'length', 'max'=>4),
			array('AMPHUR_NAME, AMPHUR_NAME_ENG', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('AMPHUR_ID, AMPHUR_CODE, AMPHUR_NAME, AMPHUR_NAME_ENG, GEO_ID, PROVINCE_ID', 'safe', 'on'=>'search'),
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
			'AMPHUR_ID' => 'Amphur',
			'AMPHUR_CODE' => 'Amphur Code',
			'AMPHUR_NAME' => 'Amphur Name',
			'AMPHUR_NAME_ENG' => 'Amphur Name Eng',
			'GEO_ID' => 'Geo',
			'PROVINCE_ID' => 'Province',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('AMPHUR_ID',$this->AMPHUR_ID);
		$criteria->compare('AMPHUR_CODE',$this->AMPHUR_CODE,true);
		$criteria->compare('AMPHUR_NAME',$this->AMPHUR_NAME,true);
		$criteria->compare('AMPHUR_NAME_ENG',$this->AMPHUR_NAME_ENG,true);
		$criteria->compare('GEO_ID',$this->GEO_ID);
		$criteria->compare('PROVINCE_ID',$this->PROVINCE_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DataAmphur the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
