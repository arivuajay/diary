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

    public function actionTest() {
        $string = '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';

        $result = $this->Uploadjournalimg($string, '.jpg');
        var_dump($result); exit;
    }

}
