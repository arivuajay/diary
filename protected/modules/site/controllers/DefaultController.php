<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout = 'home';

        $this->render('index');
    }

}
