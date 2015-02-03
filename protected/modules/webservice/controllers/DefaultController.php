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
        $params['journal_images'] = $this->Uploadjournalimg($params['image_data'], $params['image_type']);
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
        $criteria->order = 'diary_id DESC';
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

    public function actionJournaldates() {
        $criteria = new CDbCriteria();
        $criteria->select = array('DATE(t.diary_current_date) as diary_current_date');
        $criteria->with = array('diaryUser');
        $criteria->addCondition("t.diary_user_id = '" . $_REQUEST['user_id'] . "' OR diaryUser.user_email = '" . $_REQUEST['user_id'] . "'");
        if (isset($_REQUEST['pref_date']))
            $criteria->addCondition("DATE(t.diary_current_date) = '" . $_REQUEST['pref_date'] . "'");
//        $criteria->limit = 10;
        $model = Diary::model()->findAll($criteria);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $jour_date = array();
            foreach ($model as $key => $mdl) {
                $jour_date[$key]['diary_current_date'] = $mdl->diary_current_date;
            }
            $result['message'] = $jour_date;
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
        $diary_id = trim($_REQUEST['diary_id']);
        $diary_user = trim($_REQUEST['user_id']);

        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('diaryUser');
        $criteria->addCondition("t.diary_user_id = '$diary_user' OR diaryUser.user_email = '$diary_user'");
        $criteria->addCondition("t.diary_id = '$diary_id'");

        $model = Diary::model()->find($criteria);

        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $model->delete();
            $result['success'] = 1;
            $result['message'] = 'Succesfully deleted.';
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function Uploadjournalimg($base64_encode, $file_type) {
        $result = array();
        if (!empty($base64_encode) && !empty($file_type)):
            $base64_decode = base64_decode($base64_encode);
            $newfile = uniqid() . $file_type;
            $success = file_put_contents(JOURNAL_IMG_PATH . $newfile, $base64_decode);
            if ($success) {
                $result[] = $newfile;
            }
        endif;

        return $result;
    }

}
