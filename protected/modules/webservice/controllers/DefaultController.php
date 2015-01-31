<?php

class DefaultController extends Controller {

    public function actionRegisteruser() {
        $params = $_REQUEST;
        $result = Myclass::addUser($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionForgotpassword() {
        $params = $_REQUEST;
        $result = Myclass::forgotPass($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionWriteentry() {
        $params = $_REQUEST;
        $result = Myclass::addEntry($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionLoginapp() {
        $params = $_REQUEST;
        $result = Myclass::loginApp($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionListentries() {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('diaryUser');
        $criteria->addCondition("t.diary_user_id = '" . $_REQUEST['user_id'] . "' OR diaryUser.user_email = '" . $_REQUEST['user_id'] . "'");
        if (isset($_REQUEST['pref_date']))
            $criteria->addCondition("DATE(t.diary_current_date) = '" . $_REQUEST['pref_date'] . "'");
        $criteria->limit = 10;

        $model = Diary::model()->findAll($criteria);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $result['message'] = $model;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionGetentry() {
        $model = Diary::model()->findByPk($_REQUEST['diary_id']);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $result['message'] = $model;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionDeleteentry() {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('diaryUser');
        $criteria->addCondition("t.diary_user_id = '" . $_REQUEST['user_id'] . "' OR diaryUser.user_email = '" . $_REQUEST['user_id'] . "'");
        $criteria->addCondition("t.diary_id = '" . $_REQUEST['diary_id'] . "'");

        $model = Diary::model()->deleteAll($criteria);

        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $result['message'] = $model;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }
}
