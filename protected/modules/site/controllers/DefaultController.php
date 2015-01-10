<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout = 'home';
        $moodModel = new MoodType;
        $mood = Myclass::getMood();

        $this->render('index', array(
            'moodModel' => $moodModel,
        ));
    }

}
