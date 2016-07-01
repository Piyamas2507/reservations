<?php

/**
 * This is the model class for table "Blog".
 *
 * The followings are the available columns in table 'Blog':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $keyword
 * @property string $slug
 * @property string $content
 * @property string $picture
 * @property string $category
 * @property integer $user
 * @property integer $view
 * @property string $create
 * @property integer $rating
 * @property integer $status
 */
class Blog extends CActiveRecord
{
	private $_oldTags;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, slug, content, category, user, view, create, status', 'required'),
			array('status', 'in', 'range'=>array(0,1)),
			// array('keyword', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
			array('keyword', 'normalizeTags'),
			array('user, view, rating, status', 'numerical', 'integerOnly'=>true),
			array('title, description, keyword, slug, category', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, keyword, slug, content, picture, category, user, view, create, rating, status', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'keyword' => 'Keyword',
			'slug' => 'Slug',
			'content' => 'Content',
			'picture' => 'Picture',
			'category' => 'Category',
			'user' => 'User',
			'view' => 'View',
			'create' => 'Create',
			'rating' => 'Rating',
			'status' => 'Status',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('view',$this->view);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blog2 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	

	public function normalizeTags($attribute,$params)
	{
		$this->keyword=BlogTag::array2string(array_unique(BlogTag::string2array($this->keyword)));
	}

	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->keyword;
	}	

	/**
	 * This is invoked after the record is saved.
	 */
	protected function afterSave()
	{
		parent::afterSave();
		BlogTag::model()->updateFrequency($this->_oldTags, $this->keyword);
	}

	/**
	 * This is invoked after the record is deleted.
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		//Comment::model()->deleteAll('post_id='.$this->id);
		BlogTag::model()->updateFrequency($this->keyword, '');
	}
}
