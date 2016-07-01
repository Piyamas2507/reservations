<?php

class UploadFileController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('url'),
				'users'=>Yii::app()->user->getMember(),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('vipurl'),
				'users'=>Yii::app()->user->getVIP(),
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

	public function actionUrl($id)
	{
		$model=$this->loadModel($id);
		if($model->permission==0):
			UploadFile::model()->updateCounters(array('count'=>+1),'id=:id',array(':id'=>$id));
			$this->redirect(Yii::app()->request->baseUrl.$model->url);
		else:
			$this->redirect(Yii::app()->request->baseUrl.'/uploadFile/vipurl/'.$id);
		endif;
	}

	public function actionVipurl($id)
	{
		$model=$this->loadModel($id);
		UploadFile::model()->updateCounters(array('count'=>+1),'id=:id',array(':id'=>$id));
		$this->redirect(Yii::app()->request->baseUrl.$model->url);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UploadFile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UploadFile']))
		{
			$model->attributes=$_POST['UploadFile'];

			$model->count=0;

			$slug=Library::filterPostalCode($model->name);

			/**
			 * Upload UploadFile
			 */
		    $uniqueName = $slug . '-' . (time()) . '.zip';
		    $original = 'download/'.$uniqueName;

            $url = CUploadedFile::getInstance($model, 'url');

            if (!empty($url)) {
	            $model->url = $url;
	            $model->url->saveAs($original);
	            $model->url = '/download/'.$uniqueName;
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

		if(isset($_POST['UploadFile']))
		{
			$model->attributes=$_POST['UploadFile'];
			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new UploadFile('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['UploadFile']))
			$lists->attributes=$_GET['UploadFile'];

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
		$dataProvider=new CActiveDataProvider('UploadFile',array(
			'pagination'=>array(
				'pageSize'=>21,
			),
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
		$model=new UploadFile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UploadFile']))
			$model->attributes=$_GET['UploadFile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UploadFile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UploadFile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UploadFile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='upload-file-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
