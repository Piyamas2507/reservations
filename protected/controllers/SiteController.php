<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

		public function actionCalendarid($id)
	{
		$data = Reservations::model()->findAll('location_id='.$id);

		foreach ($data as $key => $value) {
			if ($value->status==0){
            	$color = '#5bc0de';
	        }
	        if ($value->status==1){
	            $color = '#f54350';
	        }
	        
	        if ($value->status==2){
	            $color = '#f0ad4e';
	        }

	        if ($value->status==3){
	            $color = '#94BA65';
	        }
			$items[] =array(
		        'title'=>'m : '.Locations::model()->findByPk($value->location_id)->name.
		        '  เวลา : '. $value->timestart.' น.'.' -'.$value->timeend.
		        ' น.',
		        'start'=>strtotime($value->datestart.' '.$value->timestart),
		        'end'=>strtotime($value->dateend.' '.$value->timeend),	 
		        'color'=>$color,
		        'allDay'=>false,
		        'url'=>Yii::app()->request->baseUrl.'/reservations/'.$value->id,
	    	);
		}


	 
	    echo CJSON::encode($items);
	    Yii::app()->end();
	}

	public function actionCalendarEvents()
	{
		$data = Reservations::model()->findAll();

		foreach ($data as $key => $value) {
			if ($value->status==0){
            	$color = '#5bc0de';
	        }
	        if ($value->status==1){
	            $color = '#f54350';
	        }
	        
	        if ($value->status==2){
	            $color = '#f0ad4e';
	        }

	        if ($value->status==3){
	            $color = '#94BA65';
	        }
			$items[] =array(
		        'title'=>'m : '.Locations::model()->findByPk($value->location_id)->name.
		        '  เวลา : '. $value->timestart.'-'.$value->timeend.
		        '',
		        'start'=>strtotime($value->datestart.' '.$value->timestart),
		        'end'=>strtotime($value->dateend.' '.$value->timeend),	 
		        'color'=>$color,
		        'allDay'=>false,
		        'url'=>Yii::app()->request->baseUrl.'/reservations/'.$value->id,
	    	);
		}


	 
	    echo CJSON::encode($items);
	    Yii::app()->end();
	}

	public function actionSitemapxml()
	{

	    $course=Course::model()->findAll(array(
	            'order'=>'id DESC',
	            //'condition'=>'status="1"',
	    ));

	    $blog=Blog::model()->findAll(array(
	            'order'=>'id DESC',
	            'condition'=>'status="1"',
	    ));        

	    $shop=Shop::model()->findAll(array(
	            'order'=>'id DESC',
	            'condition'=>'status="1"',
	    ));

	    $portfolio=Portfolio::model()->findAll(array(
	            'order'=>'id DESC',
	            //'condition'=>'status="1"',
	    ));

	    $users=Users::model()->findAll(array(
	            'order'=>'id DESC',
	            //'condition'=>'status="1"',
	    ));

	    header('Content-Type: application/xml');
	    $this->renderPartial('../site/sitemapxml',array(
	    	'course'=>$course,
	    	'blog'=>$blog,
	    	'shop'=>$shop,
	    	'portfolio'=>$portfolio,
	    	'users'=>$users,
	    	));
	}

	public function actionIndex()
	{
		$this->render('index');
	}	

	public function actionContact()
	{
		$this->render('contact');
	}	


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionRegister()
	{
		$model=new Users ('register');
        // collect user input data

        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];

		    $uniqueName = $model->username.'.jpg';
		    $original = 'upload/ProfilePicture/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'picture');

            if (!empty($picture)) {
	            $model->picture = $picture;
	            $model->picture->saveAs($original);
	            $model->picture = '/upload/ProfilePicture/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->adaptiveResize(250,250);
				$thumb->save($original);
            }

            if($model->validate())
            {
                if($model->save()){

                    Yii::app()->user->setFlash('response','');

                    $this->refresh();
                }
            }
        }

		$this->render('register',array('model'=>$model));
	}

	public function actionRecoverypassword()
    {
    	if(isset($_POST['email']))
		{
			
			$email = $_POST['email'];

        	$data=EditUsers::model()->findAll('email=:email', array(':email'=>$email));

        	if($data==NULL){
        		throw new CHttpException(555,Yii::t('app','Not found email in database.'));
        	}

        	$data=$data['0'];

        	$password = rand(100000,999999);

        	$md5password = md5($password);  

        	$update = Users::model()->updateByPk(array($data->id),array('password'=>$md5password));

        	if($update){
				$from_name = 'Palaloy.com';
				$from_email = 'indywib@gmail.com';
				$to_name = $data->display_name;
				$to_email = $data->email;
				$subject = 'New Password';
				$message = 'Your new password is : '.$password;
				$result = Email::sendGmail($from_name,$from_email, $to_name,$to_email, $subject, $message);

				if($result)
				$this->render('recoverypassword',array(
					'data'=>$data,
				));
			}

			
		} else {
			throw new CHttpException(404,'The requested page does not exist.');
		}

        
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('users/profile'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}