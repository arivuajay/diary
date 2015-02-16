<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->layout = 'home';
        $model = new QuickCreate();
        $mood_submit_model = new MoodActivity();
        $this->performAjaxValidation($model);
        if ($_POST['submit'] == 'Submit') {
            $mood_submit_model->mood_activity_email = $_POST['QuickCreate']['email'];
            $mood_submit_model->mood_activity_mood_id = $_POST['QuickCreate']['moodtype'];
            if ($mood_submit_model->save())
                Yii::app()->user->setFlash('success', "Your Mood Activity Submitted");
            $this->redirect(array('index'));
            exit;
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

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'signup') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
