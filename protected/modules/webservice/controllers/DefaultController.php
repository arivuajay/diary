<?php

class DefaultController extends Controller {

    public function actionRegisteruser($params) {
        $users = new UsersController();
        $result = $users->addUser($params);
        echo CJSON::encode($result);
//       ['status'] => 0 or 1 
//       ['message'] => If fails return error message
//        array (size=3)
//  'user_password' => 
//    array (size=1)
//      0 => string 'User Password cannot be blank.' (length=30)
//  'confirm_password' => 
//    array (size=1)
//      0 => string 'Confirm Password cannot be blank.' (length=33)
//  'user_email' => 
//    array (size=1)
//      0 => string 'user email already exists' (length=25)

        Yii::app()->end();
    }

}
