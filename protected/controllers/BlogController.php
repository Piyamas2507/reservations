<?php

class BlogController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>Yii::app()->user->getAdmin(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}





	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($slug)
	{
		$model=Blog::model()->find('slug=\''.$slug.'\' OR id=\''.$slug.'\'');
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		} else {
			Blog::model()->updateCounters(array('view'=>+1),'id=:id',array(':id'=>$model->id));
		}



		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Blog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];

			$model->user = Yii::app()->user->id;
			$model->rating = 5;
			$model->view = 0;
			$model->create = date('Y-m-d H:i:s');

			$model->slug=Library::filterPostalCode($model->title);

			/**
			 * Upload ProfilePicture
			 */
		    $uniqueName = $model->slug . '-' . (time()) . '.jpg';
		    $original = 'upload/BlogPicture/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'picture');

            if (!empty($picture)) {
	            $model->picture = $picture;
	            $model->picture->saveAs($original);
	            $model->picture = '/upload/BlogPicture/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->resize(630,630);
				$thumb->crop(0, 0, 630, 420);
				$thumb->save($original);
            }

			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];

			$model->slug=Library::filterPostalCode($model->title);

	 		/**
			 * Upload ProfilePicture
			 */
		    $uniqueName = $model->slug . '-' . (time()) . '.jpg';
		    $original = 'upload/BlogPicture/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'picture');

            if (!empty($picture)) {
	            $model->picture = $picture;
	            $model->picture->saveAs($original);
	            $model->picture = '/upload/BlogPicture/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->resize(630,630);
				$thumb->crop(0, 0, 630, 420);
				$thumb->save($original);
            }

			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}
		}

		$lists=new Blog('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['Blog']))
			$lists->attributes=$_GET['Blog'];

		$this->render('update',array(
			'model'=>$model,
			'lists'=>$lists,
		));

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria();
		$criteria->addSearchCondition('status', 1, true, 'AND' );
		$criteria->order = 'id DESC';

		if(isset($_GET['tag'])){	
			$criteria->addSearchCondition('keyword',$_GET['tag']);
		}

		if(isset($_GET['search'])){
			$criteria=new CDbCriteria();
			$keyword = explode(' ', $_GET['search']);
			foreach ($keyword as $key => $value) {
				$criteria->addSearchCondition('title', $value, true, 'OR' );
				$criteria->addSearchCondition('description', $value, true, 'OR' );
				$criteria->addSearchCondition('content', $value, true, 'OR' );
				$criteria->addSearchCondition('keyword', $value, true, 'OR' );
				$criteria->addSearchCondition('status', 1, true, 'AND' );
			}
		}


		$dataProvider=new CActiveDataProvider('Blog', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['blog']['postsPerPage'],
			),
			'criteria'=>$criteria,

		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Blog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Blog']))
			$model->attributes=$_GET['Blog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAjaxupdate()
	{
	    $act = $_GET['act'];

	        $autoIdAll = $_POST['autoId'];
	        if(count($autoIdAll)>0)
	        {
	            foreach($autoIdAll as $autoId)
	            {
	                $model=$this->loadModel($autoId);
	                if($act=='doDelete')
	                    $this->loadModel($autoId)->delete();
	                if($act=='doActive')
	                    $model->status = '1';
	                if($act=='doInactive')
	                    $model->status = '0';
	                if($model->save())
	                    echo 'ok';
	                else
	                    throw new Exception("Sorry",500);
	            }
	        }
	}

	public function loadModel($id)
	{
		$model=Blog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
