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
        if (!empty($_FILES['image']))
            $params['journal_images'] = $this->Uploadjournalimg($_FILES['image']);

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
            $record = array();
            foreach ($model as $i => $data) {
                $record[$i] = (array) $data->attributes;
                $record[$i]['diary_images'] = array_values(CHtml::listData($data->diaryImages, 'diary_img_id', 'diary_image'));
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
            $record[0] = (array) $model->attributes;
            $record[0]['diary_images'] = array_values(CHtml::listData($model->diaryImages, 'diary_img_id', 'diary_image'));
            $result['message'] = $record;
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
        $target_path = JOURNAL_IMG_PATH;
        $log = array();
        for ($i = 0; $i < count($diary_images['name']); $i++):
            if (isset($diary_images['name'][$i])) {
                $filename = md5(microtime()) . basename($diary_images['name'][$i]);
                try {
                    // Throws exception incase file is not being moved
                    if (!move_uploaded_file($diary_images['tmp_name'][$i], $target_path . $filename)) {
                        $log[$k]['error'] = true;
                        $log[$k]['message'] = 'Could not move the file!';
                        $log[$k]['tmp_name'] = $diary_images['tmp_name'][$i];
                    }

                    $result[] = $filename;
                    // File successfully uploaded
                    $log[$k]['message'] = 'File uploaded successfully!';
                    $log[$k]['error'] = false;
                    $log[$k]['file_path'] = $filename;
                } catch (Exception $e) {
                    $log[$k]['error'] = true;
                    $log[$k]['message'] = $e->getMessage();
                }
            } else {
                // File parameter is missing
                $log[$k]['error'] = true;
                $log[$k]['error'] = $diary_images['name'][$i];
                $log[$k]['message'] = 'Not received any file!F';
            }
        endfor;

        return $result;
    }

//    public function Uploadjournalimg($diary_images) {
//        $result = array();
////        $params['image_data'], $params['image_type']
//        foreach ($diary_images as $image):
//            $base64_encode = $image['image_data'];
//            $file_type = $image['image_type'];
//            if (!empty($base64_encode) && !empty($file_type)):
//                $base64_decode = base64_decode($base64_encode);
//                $newfile = uniqid() . $file_type;
//                $success = file_put_contents(JOURNAL_IMG_PATH . $newfile, $base64_decode);
//                if ($success) {
//                    $result[] = $newfile;
//                }
//            endif;
//        endforeach;
//
//        return $result;
//    }

    public function actionSearchresult() {
        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('diaryCategory');
        $criteria->addCondition("t.diary_user_id = '" . $_REQUEST['user_id'] . "'");
        $criteria->addCondition("t.diary_title = '" . $_REQUEST['searchdata'] . "'  OR t.diary_tags = '" . $_REQUEST['searchdata'] . "'  OR t.diary_current_date = '" . $_REQUEST['searchdata'] . "' OR diaryCategory.category_name = '" . $_REQUEST['searchdata'] . "'");
        $model = Diary::model()->findAll($criteria);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            foreach ($model as $i => $data) {
                $result['message'][$i] = $data->attributes;
            }
        }
        echo CJSON::encode($result);


        Yii::app()->end();
    }

    public function actionGetcms() {
        $model = Cms::model()->findByPk($_REQUEST['cms_id']);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $record = $model->attributes;
            $record['body'] = strip_tags($record['body']);

            $result['message'] = $model->attributes;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionContact() {
        $params = $_REQUEST;
        $result = Myclass::addContact($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionFeedback() {
        $params = $_REQUEST;
        $result = Myclass::addContact($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

}
