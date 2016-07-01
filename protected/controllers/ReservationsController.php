<?php

class ReservationsController extends Controller
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
				'actions'=>array('index','view','create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('confirm','denine','report','reportuse'),
				'users'=>Yii::app()->user->getVIP(),
			),
			array('allow',  // พิมพ์ใบอนุญาต
				'actions'=>array('print'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>Yii::app()->user->getVIP(),
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

	public function actionPrint($id)
	{
		$this->layout='//layouts/pdf';
		$this->render('print',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionConfirm($id)
	{
		$model=$this->loadModel($id);

		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 2)
			Reservations::model()->updateByPk(array($id),array('status'=>2));
		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 3)
			Reservations::model()->updateByPk(array($id),array('status'=>3));
		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 4)
			Reservations::model()->updateByPk(array($id),array('status'=>3));

			Yii::app()->user->setFlash('response','');
			$this->redirect(array('users/profile'));

	}

	public function actionDenine($id)
	{
		$model=$this->loadModel($id);

		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 2)
			Reservations::model()->updateByPk(array($id),array('status'=>1));
		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 3)
			Reservations::model()->updateByPk(array($id),array('status'=>1));
		if(Users::model()->findByPk(Yii::app()->user->id)->level_user == 4)
			Reservations::model()->updateByPk(array($id),array('status'=>1));

			Yii::app()->user->setFlash('response','');
			$this->redirect(array('users/profile'));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Reservations;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reservations']))
		{
			$model->attributes=$_POST['Reservations'];
			$model->dateend>=$model->datestart;
			$model->create=date('Y-m-d H:i:s');
			$model->status=0;
			$model->timestart=$model->hourstart.':'.$model->minstart;
			$model->timeend=$model->hourend.':'.$model->minend;
			if($model->datestart<date('Y-m-d H:i:s',strtotime("+2 days")))
				throw new CHttpException(1,'กรุณาจองล่วงหน้าอย่างน้อย 2 วัน');
			if($model->dateend<$model->datestart)
				throw new CHttpException(4,'เลือกวันที่สิ้นสุดไม่ถูกต้อง กรุณาระบุวันที่สิ้นสุดใหม่');
			// if($model->timeend<=$model->timestart)
			// 	throw new CHttpException(4,'เวลาสิ้นสุดต้องไม่น้อยกว่าเวลาเริ่มต้น กรุณาระบุเวลาสิ้นสุดใหม่');

			//****************************************************จองเวลาสิ้นสุดน้อยกว่าเวลาเริ่มต้น
			if($model->dateend==$model->datestart){
				if($model->timeend<=$model->timestart)
				throw new CHttpException(5,'ในวันเดียวกัน จะต้องระบุเวลาสิ้นสุดไม่น้อยกว่าเวลาเริ่มต้น');
			}
			//****************************************************จองเวลาสิ้นสุดน้อยกว่าเวลาเริ่มต้น
			
			

			$data = Reservations::model()->findAll('location_id='.$model->location_id);
			if($data)
				foreach ($data as $key => $value) {
					if($model->volumn > Locations::model()->findByPk($model->location_id)->volumn)
						throw new CHttpException(2,'จำนวนคนจะต้องไม่เกิน '.Locations::model()->findByPk($model->location_id)->volumn.' คน'.' หากจำนวนคนเกินมาไม่เกิน 5 คนกรุณาระบุในช่องหมายเหตุเพื่อแจ้งให้เจ้าหน้าที่ทราบ');
					$data2 = Reservations::model()->findAll('location_id='.$model->location_id.' AND (\''.$model->datestart.' '.$model->timestart.'\' BETWEEN \''.$value['datestart'].' '.$value['timestart'].'\' AND \''.$value['dateend'].' '.$value['timeend'].'\')');
					$data3 = Reservations::model()->findAll('location_id='.$model->location_id.' AND (\''.$model->datestart.' '.$model->timestart.'\' BETWEEN \''.$value['datestart'].' '.$value['timestart'].'\' AND \''.$value['datestart'].' '.$value['timeend'].'\')');

					if($data2)
						throw new CHttpException(3,Locations::model()->findByPk($model->location_id)->name.' มีผู้ขอใช้ในวันที่ '.Load::Dateformat($value['datestart']).' เวลา '.$value['timestart'].' น. ถึงวันที่ '.Load::Dateformat($value['dateend']).' เวลา '.$value['timeend'].' น. แล้ว');
					
					//จองคนละวันกันแต่เวลาเดียวกันในช่วงเวลาของวันที่เริ่มจนถึงวันที่สิ้นสุด
					if($data3)
						throw new CHttpException(3,Locations::model()->findByPk($model->location_id)->name.' มีผู้ขอใช้ในวันที่ '.Load::Dateformat($value['datestart']).' เวลา '.$value['timestart'].' น. ถึงวันที่ '.Load::Dateformat($value['datestart']).' เวลา '.$value['timeend'].' น. แล้ว');
				}

			if($model->save()){
				Yii::app()->user->setFlash('response','');
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

		if(isset($_POST['Reservations']))
		{
			$model->attributes=$_POST['Reservations'];
			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new Reservations('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservations']))
			$lists->attributes=$_GET['Reservations'];

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
		$model=new Reservations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservations'])){
			$model->attributes=$_GET['Reservations'];
				$this->layout='//layouts/pdf';
				$this->render('report',array(
				'model'=>$model,
			));
		} else {

			$this->render('index',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=new Reservations('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservations'])){
			$model->attributes=$_GET['Reservations'];
				$this->layout='//layouts/pdf';
				$this->render('report',array(
				'model'=>$model,
				));
				// $mPDF1 = Yii::app()->ePdf->mpdf('th', 'A4-L', '0', 'THSaraban'); 
    //             $mPDF1->WriteHTML($this->render('report',array(
				// 'model'=>$model,
				// ),true)
    //             );               
    //             $mPDF1->output();  
				
		} else {

			$this->render('admin',array(
				'model'=>$model,
			));
		}
	}

	public function actionReport()
	{

		$this->layout='//layouts/pdf';
		$model=new Reservations('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservations'])){
			$model->attributes=$_GET['Reservations'];
		
			$this->render('report',array(
				'model'=>$model,
				));
		// $mPDF1 = Yii::app()->ePdf->mpdf('th', 'A4-L', '0', 'THSaraban'); 
  //               $mPDF1->WriteHTML($this->render('report',array(
		// 		'model'=>$model,
		// 		),true)
  //               );               
  //               $mPDF1->output();  
		}
	}

	public function actionReportuse()
	{

		$model=new Reservations('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reservations'])){
			$model->attributes=$_GET['Reservations'];
				$this->layout='//layouts/pdf';

				// $mPDF1 = Yii::app()->ePdf->mpdf('th', 'A4-L', '0', 'THSaraban'); 

				if($model->datestart){
					$start=$model->datestart;
					$model->datestart='AND datestart>="'.$model->datestart.'"';
				}
				if($model->dateend){
					$end=$model->dateend;
					$model->dateend='AND dateend<="'.$model->dateend.'"';
				}
				$this->render('reportuse',array(
					'model'=>$model,
					'datestart'=>$model->datestart,
					'start'=>$start,
					'end'=>$end,
					'dateend'=>$model->dateend,
					'status'=>$model->status,
				));

    //             $mPDF1->WriteHTML($this->render('reportuse',array(
				// 	'model'=>$model,
				// 	'datestart'=>$model->datestart,
				// 	'start'=>$start,
				// 	'end'=>$end,
				// 	'dateend'=>$model->dateend,
				// 	'status'=>$model->status,
				// ),true));               
    //             $mPDF1->output();  
				
		} else {

			$this->render('admin2',array(
				'model'=>$model,
			));
		} 
		
	}

	public function actionGraph(){

		$this->render('graph',array(
			
		));
	}



	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Reservations the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Reservations::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Reservations $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reservations-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
