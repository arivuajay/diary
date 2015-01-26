<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout = 'home';
        $model = new QuickCreate();
        $this->performAjaxValidation($model);
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
        $this->render('index', compact('model'));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hcontact_form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
