<?php

/**
 * This is the model class for table "locations".
 *
 * The followings are the available columns in table 'locations':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $building
 * @property string $size
 * @property integer $volumn
 * @property integer $computer
 * @property integer $projector
 * @property integer $visualizer
 * @property integer $microphone
 * @property integer $television
 * @property integer $air
 * @property integer $fan
 * @property string $other
 * @property integer $status
 * @property string $picture
 */
class Locations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, type, building, size, janitor_id, volumn, computer, projector, visualizer, microphone, television, air, fan, status', 'required'),
			array('type, volumn, computer, projector, visualizer, microphone, television, air, fan, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('building, size', 'length', 'max'=>50),
			array('other', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, building, size, volumn, computer, projector, visualizer, microphone, television, air, fan, other, status, picture', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','รหัส'),
			'name' => Yii::t('app','ชื่ออาคาร/สถานที่'),
			'type' => Yii::t('app','ประเภท'),
			'building' => Yii::t('app','ตำแหน่ง/อาคาร'),
			'size' => Yii::t('app','ขนาด'),
			'volumn' => Yii::t('app','ความจุ(คน)'),
			'computer' => Yii::t('app','คอมพิวเตอร์(เครื่อง)'),
			'projector' => Yii::t('app','โปรเจคเตอร์(ตัว)'),
			'visualizer' => Yii::t('app','เครื่องฉายแสง(เครื่อง)'),
			'microphone' => Yii::t('app','ไมค์(ตัว)'),
			'television' => Yii::t('app','โทรทัศน์(เครื่อง)'),
			'air' => Yii::t('app','แอร์(ตัว)'),
			'fan' => Yii::t('app','พัดลม(ตัว)'),
			'other' => Yii::t('app','อื่นๆ'),
			'status' => Yii::t('app','สถานะ'),
			'picture' => Yii::t('app','รูปภาพ'),
			'janitor_id'=> Yii::t('app','ผู้ดูแล')
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('building',$this->building,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('volumn',$this->volumn);
		$criteria->compare('computer',$this->computer);
		$criteria->compare('projector',$this->projector);
		$criteria->compare('visualizer',$this->visualizer);
		$criteria->compare('microphone',$this->microphone);
		$criteria->compare('television',$this->television);
		$criteria->compare('air',$this->air);
		$criteria->compare('fan',$this->fan);
		$criteria->compare('other',$this->other,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('picture',$this->picture,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Locations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
