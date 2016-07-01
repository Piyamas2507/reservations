<?php
// models/ChangePasswordForm.php

class ChangePasswordForm extends CFormModel
{
    /**
     * @var string
     */
    public $currentPassword;

    /**
     * @var string
     */
    public $newPassword;

    /**
     * @var string
     */
    public $newPasswordRepeat;

    /**
     * Validation rules for this form.
     *
     * @return array
     */
    public function rules()
    {
        return array(
            array('currentPassword, newPassword, newPasswordRepeat', 'required'),
            array('currentPassword', 'validateCurrentPassword', 'message'=>'This is not your password.'),
            array('newPassword,newPasswordRepeat','length','max'=>32, 'min'=>4),
            array('newPasswordRepeat', 'compare', 'compareAttribute'=>'newPassword'),
            array('newPassword', 'compare', 'compareAttribute'=>'currentPassword','operator'=>'!=','message'=>'New Password must not be the same as Current Password'),  
        );
    }

    /**
     * I don't know your hashing policy, so I assume it's simple MD5 hashing method.
     * 
     * @return string Hashed password
     */
    protected function createPasswordHash($password)
    {
        return md5($password);
    }

    /**
     * I don't know how you access user's password as well.
     *
     * @return string
     */
    protected function getUserPassword()
    {
        return Load::Password(Yii::app()->user->id);
    }

    /**
     * Saves the new password.
     */
    public function saveNewPassword()
    {
        Users::model()->updateByPk(array(Yii::app()->user->id),array('password'=>$this->createPasswordHash($this->newPassword)));
    }

    /**
     * Validates current password.
     *
     * @return bool Is password valid
     */
    public function validateCurrentPassword()
    {
        return $this->createPasswordHash($this->currentPassword) == $this->getUserPassword();
    }
}