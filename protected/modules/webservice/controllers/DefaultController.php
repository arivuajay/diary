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

    public function actionUploadjournalimg() {
//        header('Content-Type: image/png');
//        $path = '/' . JOURNAL_IMG_PATH . 'avatar1.jpg';
//        $fileurl = file_get_contents($this->createAbsoluteUrl($path));
//        $base64_encode = base64_encode($fileurl);
//        var_dump($base64_encode);
        $base64_encode = $_REQUEST['data'];
        $file_type = $_REQUEST['type'];

        if (!empty($base64_encode) && !empty($file_type)):
            $base64_decode = base64_decode($base64_encode);
            $newfile = uniqid() . $file_type;
            $success = file_put_contents(JOURNAL_IMG_PATH . $newfile, $base64_decode);
            if ($success) {
                $result['success'] = 1;
                $result['message'] = $newfile;
            } else {
                $result['success'] = 0;
                $result['message'] = 'Unable to save file';
            }
        endif;

        echo CJSON::encode($result);
        Yii::app()->end();
    }

}
