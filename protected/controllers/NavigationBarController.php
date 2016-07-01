<?php

class NavigationBarController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>Yii::app()->user->getAdmin(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionSwap($id,$side)
	{
		if($side==1){
			$model=NavigationBar::model()->findByPk($id);
			$model->id=0;
			$model->save();
			$model2=NavigationBar::model()->findByPk($id+1);
			if($model2!==NULL){
				$model2->id=$id;
				$model2->save();
			}
			$model3=NavigationBar::model()->findByPk(0);
			$model3->id=$id+1;
			$model3->save();
			$this->redirect(array('admin'));
		} else {
			$model=NavigationBar::model()->findByPk($id);
			$model->id=0;
			$model->save();
			$model2=NavigationBar::model()->findByPk($id-1);
			if($model2!==NULL){
				$model2->id=$id;
				$model2->save();
			}
			$model=NavigationBar::model()->findByPk(0);
			$model->id=$id-1;
			$model->save();
			$this->redirect(array('admin'));
		}
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new NavigationBar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NavigationBar']))
		{
			$model->attributes=$_POST['NavigationBar'];
			if($model->save())
				$this->redirect(array('admin'));
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

		if(isset($_POST['NavigationBar']))
		{
			$model->attributes=$_POST['NavigationBar'];
			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new NavigationBar('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['NavigationBar']))
			$lists->attributes=$_GET['NavigationBar'];

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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NavigationBar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NavigationBar']))
			$model->attributes=$_GET['NavigationBar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return NavigationBar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=NavigationBar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param NavigationBar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='navigation-bar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
