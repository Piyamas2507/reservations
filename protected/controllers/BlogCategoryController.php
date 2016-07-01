<?php

class BlogCategoryController extends Controller
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BlogCategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BlogCategory']))
		{
			$model->attributes=$_POST['BlogCategory'];

			$name=$this->filterPostalCode($model->name);

			/**
			 * Upload ProfilePicture
			 */
		    $uniqueName = $name . '-' . (time()) . '.jpg';
		    $original = 'upload/BlogPicture/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'picture');

            if (!empty($picture)) {
	            $model->picture = $picture;
	            $model->picture->saveAs($original);
	            $model->picture = '/upload/BlogPicture/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->resize(190,190);
				$thumb->save($original);
            }

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['BlogCategory']))
		{
			$model->attributes=$_POST['BlogCategory'];

			$name=$this->filterPostalCode($model->name);

			/**
			 * Upload ProfilePicture
			 */
		    $uniqueName = $name . '-' . (time()) . '.jpg';
		    $original = 'upload/BlogPicture/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'picture');

            if (!empty($picture)) {
	            $model->picture = $picture;
	            $model->picture->saveAs($original);
	            $model->picture = '/upload/BlogPicture/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->resize(190,190);
				$thumb->save($original);
            }
            
			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new BlogCategory('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['BlogCategory']))
			$lists->attributes=$_GET['BlogCategory'];

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
		$dataProvider=new CActiveDataProvider('BlogCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BlogCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BlogCategory']))
			$model->attributes=$_GET['BlogCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function filterPostalCode($string)
	{
	$string = preg_replace("`\[.*\]`U","",$string);
	$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
	$string = str_replace('%', '-percent', $string);
	$string = htmlentities($string, ENT_COMPAT, 'utf-8');
	$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
	$string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
	$string = strtolower(trim($string, '-'));

		return $string;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return BlogCategory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=BlogCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param BlogCategory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
