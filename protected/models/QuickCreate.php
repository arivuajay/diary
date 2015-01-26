<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class QuickCreate extends CFormModel {

    public $email;
    public $moodtype;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('email, moodtype', 'required'),
            array('email', 'email'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'email' => 'Email Address',
            'moodtype' => 'Select Your Mood'
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function checkUserExists() {
        if (!$this->hasErrors()) {
            $userModel = Users::model()->exists("user_email = '{$this->email}'");
            Yii::app()->session['temp_user_mail'] = $this->email;
            Yii::app()->session['temp_user_mood'] = $this->moodtype;

            if (!empty($userModel)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);

            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
            $model = Users::model()->findByPk($this->_identity->id);
            $model->setAttribute('user_last_login', date('Y-m-d H:i:s'));
//            $model->setAttribute('user_login_ip', Yii::app()->request->getUserHostAddress());
            $model->save(false);
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

}
