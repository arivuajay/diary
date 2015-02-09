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

//    'diary_images'
//        0 
//            image_data
//            image_type

    public function actionWriteentry() {
        $params = $_REQUEST;
       var_dump(CJSON::decode($params['diary_images']));
        echo 'hi';
       exit;
        if (!empty($params['diary_images']))
            $params['journal_images'] = $this->Uploadjournalimg($params['diary_images']);
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
        $array = array(0=>array('image'=>'fgfgfg.jpg','type'=>'.jpg'),array('image'=>'fgfgfg.jpg','type'=>'.jpg'));
        var_dump($encode = CJSON::encode($array)); 
        var_dump($decode = CJSON::decode($encode)); 
        exit;
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
            $record = array();
            foreach ($model as $data) {
                $record = $data->attributes;
                $record['diary_images'] = array_values(CHtml::listData($data->diaryImages, 'diary_img_id', 'diary_image'));
            }
            $result['message'] = $record;
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

    public function Uploadjournalimg($diary_images) {
        $result = array();
//        $params['image_data'], $params['image_type']
        foreach ($diary_images as $image):
            $base64_encode = $image['image_data'];
            $file_type = $image['image_type'];
            if (!empty($base64_encode) && !empty($file_type)):
                $base64_decode = base64_decode($base64_encode);
                $newfile = uniqid() . $file_type;
                $success = file_put_contents(JOURNAL_IMG_PATH . $newfile, $base64_decode);
                if ($success) {
                    $result[] = $newfile;
                }
            endif;
        endforeach;

        return $result;
    }

}
