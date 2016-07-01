<?php
class Users extends CActiveRecord
{
	public $password2;
	public $verifyCode;
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
			array('username, password, password2, display_name, email,telephone', 'required'),
			array('username, password, password2', 'length', 'max'=>32, 'min'=>4),
			// for picture
			array('picture', 'file', 'allowEmpty'=>true, 'types'=>'jpg, jpeg, gif, png', 'maxSize'=>1024000,'tooLarge'=>'The file was larger than 1MB. Please upload a smaller file.'),
			// lower case, Upper case, number, '-', '_'
			array(
	            'username',
	            'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9\_\-\.]/',
	            'message' => 'Invalid characters in username.',
    		),
			// convert username to lower case
			array('username', 'filter','filter'=>'strtolower'),
			// compare password to repeated password
            array('password2', 'compare', 'compareAttribute'=>'password'), 
			array('email', 'length', 'max'=>100),
			// make sure email is a valid email
			array('email','email'),
            // make sure username and email are unique
            array('username, email', 'unique'), 
            // verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username,display_name, password, email, create_date, last_login, count_login, level_user, picture', 'safe', 'on'=>'search'),
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
			'display_name' =>'ชื่อ',
			'telephone' => 'หมายเลขโทรศัพท์',
			'password' => 'รหัสผ่าน',
			'password2' => 'ยืนยันรหัสผ่าน',
			'email' => 'อีเมลล์',
			'create_date' => 'วันที่ลงทะเบียน',
			'last_login' => 'Last Login',
			'count_login' => 'Count Login',
			'level_user' => 'Level User',
			'verifyCode'=>'Verification Code',
			'picture'=>'รูปภาพ'
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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave() 
    { 
        $password = md5($this->password);  
        $this->password = $password;
        $this->create_date=date('Y-m-d H:i:s');
        $this->last_login=date('Y-m-d H:i:s');
        $this->count_login=0;
        $this->level_user=1;
        return true; 
    }
    
    public function validatePassword($password)
    {
        return $this->hashPassword($password)===$this->password;
    }
    public function hashPassword($password)
    {
        return md5($password);
    }

}
