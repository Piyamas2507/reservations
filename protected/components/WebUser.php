<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

  // Store model to not repeat query.
  private $_model;
  public $username;

  /**
  * Return Value
  * access it by Yii::app()->user->detail->picture
  */  
function getDetail(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user;
}

  /**
  * Return Array username
  * access it by Yii::app()->user->getMember()
  * access it by Yii::app()->user->getVIP()
  * access it by Yii::app()->user->getEditor()
  * access it by Yii::app()->user->getAdmin()
  */
function getMember(){
    $users=EditUsers::model()->findAll('level_user>=1');
        foreach($users as $key => $value){
                $data[$key] = $value->username;
        }
    return $data;
}
function getVIP(){
    $users=EditUsers::model()->findAll('level_user>=2');
        foreach($users as $key => $value){
                $data[$key] = $value->username;
        }
    return $data;
}
function getEditor(){
    $users=EditUsers::model()->findAll('level_user>=3');
        foreach($users as $key => $value){
                $data[$key] = $value->username;
        }
    return $data;
}
function getAdmin(){
    $users=EditUsers::model()->findAll('level_user>=4');
        foreach($users as $key => $value){
                $data[$key] = $value->username;
        }
    return $data;
}

/**
* This is a function that checks the field 'role'
* Yii::app()->user->isGuest
* Yii::app()->user->isAdmin()
* Yii::app()->user->isMember()
* Yii::app()->user->isVIP()
* Yii::app()->user->isEditor()
*/
function isMember(){
  $user = $this->loadUser(Yii::app()->user->id);
  return intval($user->level_user) >= 1;
}
function isVIP(){
  $user = $this->loadUser(Yii::app()->user->id);
  return intval($user->level_user) == 2;
}
function isEditor(){
  $user = $this->loadUser(Yii::app()->user->id);
  return intval($user->level_user) >= 3;
}
function isAdmin(){
  $user = $this->loadUser(Yii::app()->user->id);
  return intval($user->level_user) >= 4;
}

  // Load Register model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null):
                $this->_model=Users::model()->findByPk($id);
            else:
                $this->_model=new Users;
                $this->_model->level_user=0;
            endif;
        }
        return $this->_model;
    }
}
?>