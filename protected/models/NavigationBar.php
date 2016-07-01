<?php

/**
 * This is the model class for table "NavigationBar".
 *
 * The followings are the available columns in table 'NavigationBar':
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property integer $dropdown
 * @property string $url
 */
class NavigationBar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'NavigationBar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, icon, dropdown, url', 'required'),
			array('dropdown', 'numerical', 'integerOnly'=>true),
			array('name, icon, url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, icon, dropdown, url', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','ชื่อเมนู'),
			'icon' => Yii::t('app','Icon'),
			'dropdown' => Yii::t('app','สำหรับ'),
			'url' => Yii::t('app','Url'),
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
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('dropdown',$this->dropdown);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>100,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NavigationBar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function Swap($id){
        echo '<a class="fa fa-level-down btn btn-default" rel="tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Down" title="" href="'.Yii::app()->request->baseUrl.'/navigationBar/swap/id/'.$id.'/side/1"><img src="" alt=""></a>';
        if($id!=1)
            echo '<a class="fa fa-level-up btn btn-default" rel="tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Up" title="" href="'.Yii::app()->request->baseUrl.'/navigationBar/swap/id/'.$id.'/side/-1"><img src="" alt=""></a>';
    }

    public static function Name($id){
        if($id==0){
            echo 'Root';
        }
        else if($id==999){
            echo 'For Admin';
        }
        else if($id==888){
            echo 'Make Dropdown';
        }
        else {
            echo NavigationBar::model()->findByPk($id)->name;
        }

    }

    public static function Icon($icon){
        echo '<i class="fa '.$icon.'"></i>';
    }
}
