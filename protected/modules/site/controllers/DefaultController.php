<?php

class DefaultController extends Controller {

    public function actionIndex() {
        Yii::app()->theme = 'site';
        $this->layout = 'home';
        
        //print_r($_POST);
        $this->render('index');
        
    }
    public function actionLogin() {
        //echo 'test';
       // $this->layout = 'login';
        $model = new LoginForm('login');
      //  $forget = new LoginForm('forgotpassword');
        
        // collect user input data
        if (isset($_POST['sign_in'])) {
            print_r($_POST['sign_in']);
              print_r($_POST['LoginForm']);//exit;
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate() && $model->login()):
                echo 'test';//exit;
               //$this->redirect(array('/entry/create'));
            endif;
        }
           $this->render('login', array('model' => $model));
       // $this->render('login', compact('model' ,'forget'));
    }


}
