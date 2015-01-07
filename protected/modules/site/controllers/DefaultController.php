<?php

class DefaultController extends Controller {

    public function actionIndex() {
        Yii::app()->theme = 'site';
        $this->layout = 'home';
        $this->render('index');
    }

}
