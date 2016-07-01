<?php

/**
 * This is the model class for table "Users".
 *
 * The followings are the available columns in table 'Users':
 * @property integer $id
 * @property string $username
 * @property string $display_name
 * @property string $telephone
 * @property string $password
 * @property string $email
 * @property string $picture
 * @property string $create_date
 * @property string $last_login
 * @property integer $count_login
 * @property integer $level_user
 */
class EditUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, display_name, telephone, password, email', 'required'),
			array('username, password', 'length', 'max'=>32, 'min'=>4),
			array(
	            'username',
	            'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9\_\-\.]/',
	            'message' => 'Invalid characters in username.',
    		),
    		array('username', 'filter','filter'=>'strtolower'),
    		array('email','email'),
			array('picture', 'file', 'allowEmpty'=>true, 'types'=>'jpg, jpeg, gif, png', 'maxSize'=>409600,'tooLarge'=>'The file was larger than 400K. Please upload a smaller file.'),
			array('count_login, level_user', 'numerical', 'integerOnly'=>true),
			array('username, password', 'length', 'max'=>32),
			array('display_name, telephone, picture', 'length', 'max'=>255),
			array('email', 'length', 'max'=>100),
			array('username, email', 'unique'), 
			array('create_date, last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, display_name, telephone, password, email, picture, create_date, last_login, count_login, level_user', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'ชื่อผู้ใช้',
			'display_name' => 'ชื่อ',
			'telephone' => 'หมายเลขโทรศัพท์',
			'password' => 'รหัสผ่าน',
			'email' => 'อีเมลล์',
			'picture' => 'รูปภาพ',
			'create_date' => 'วันที่ลงทะเบียน',
			'last_login' => 'Last Login',
			'count_login' => 'Count Login',
			'level_user' => 'สถานะ',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('count_login',$this->count_login);
		$criteria->compare('level_user',$this->level_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EditUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
