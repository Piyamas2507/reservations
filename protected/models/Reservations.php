<?php

/**
 * This is the model class for table "reservations".
 *
 * The followings are the available columns in table 'reservations':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $lastname
 * @property string $code
 * @property integer $status_id
 * @property string $position
 * @property string $department
 * @property string $create
 * @property string $datestart
 * @property string $dateend
 * @property string $timestart
 * @property string $timeend
 * @property integer $volumn
 * @property string $detail
 * @property string $comment
 * @property integer $status
 * @property string $phone
 */
class Reservations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $hourstart;
	public $minstart;
	public $hourend;
	public $minend;
	public function tableName()
	{
		return 'reservations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_id,minend,hourend,minstart,hourstart,title, name, lastname, code, status_id, position, create, datestart, dateend, timestart, timeend, volumn, detail, status, phone', 'required'),
			array('status_id, volumn, status', 'numerical', 'integerOnly'=>true),
			array('title, phone', 'length', 'max'=>20),
			array('name, lastname', 'length', 'max'=>20),
			array('code', 'length', 'max'=>20),
			array('position, department', 'length', 'max'=>50),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, name, lastname, code, status_id, position, department, create, datestart, dateend, timestart, timeend, volumn, detail, comment, status, phone', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','เลขที่'),
			'location_id' => Yii::t('app','อาคาร/สถานที่'),
			'title' => Yii::t('app','คำนำหน้าชื่อ'),
			'name' => Yii::t('app','ชื่อ'),
			'lastname' => Yii::t('app','นามสกุล'),
			'code' => Yii::t('app','รหัสบัตรประชาชน'),
			'status_id' => Yii::t('app','สถานะผู้ขอใช้'),
			'position' => Yii::t('app','ตำแหน่ง'),
			'department' => Yii::t('app','หน่วยงาน'),
			'create' => Yii::t('app','วัน/เวลาที่ขอใช้'),
			'datestart' => Yii::t('app','วันที่เริ่มต้น'),
			'dateend' => Yii::t('app','วันที่สิ้นสุด'),
			'timestart' => Yii::t('app','เวลาเริ่มต้น'),
			'timeend' => Yii::t('app','เวลาสิ้นสุด'),
			'volumn' => Yii::t('app','จำนวน(คน)'),
			'detail' => Yii::t('app','วัตถุประสงค์'),
			'comment' => Yii::t('app','หมายเหตุ'),
			'status' => Yii::t('app','สถานะ'),
			'phone' => Yii::t('app','หมายเลขโทรศัพท์'),
			'hourstart' => Yii::t('app','เวลา'),
			'hourend' => Yii::t('app','เวลา'),
			'minstart' => Yii::t('app','นาที'),
			'minend' => Yii::t('app','นาที'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('datestart',$this->datestart,true);
		$criteria->compare('dateend',$this->dateend,true);
		$criteria->compare('timestart',$this->timestart,true);
		$criteria->compare('timeend',$this->timeend,true);
		$criteria->compare('volumn',$this->volumn);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reservations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
