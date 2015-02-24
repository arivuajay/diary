<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout = 'home';
        $model = new QuickCreate();
        $this->performAjaxValidation($model);
        if ($_POST['submit'] == 'Submit') {
            
            $submit_data = $_POST;
            Myclass::addSubmitmood($submit_data);
            
            
                Yii::app()->user->setFlash('success', "Your Mood Activity Submitted");
            $this->redirect(array('index'));
        } else {
            if (isset($_POST['QuickCreate'])) {
                $model->attributes = $_POST['QuickCreate'];
                if ($model->validate()) {
                    if ($model->checkUserExists()) {
                        $this->redirect(array('users/login'));
                    } else {
                        $this->redirect(array('users/register'));
                    }
                }
            }
        }
        $this->render('index', compact('model'));
    }
    
    public function actionUnderdevelopment() {
        $this->layout = '//layouts/frontinner';
        $this->render('underdevelopment');
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'signup') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
