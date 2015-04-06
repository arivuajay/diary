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
        $search_user_id = Users::model()->findByAttributes(array('user_email' => $_REQUEST['user_email']));
        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('diaryCategory');
        $criteria->addCondition("t.diary_user_id = '" . $search_user_id->user_id . "'");
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
//            Remove trim char
            $content = trim(strip_tags($record['body']));
//            Remove &nbsp; & &amp; html entity
            $content = preg_replace("/&#?[a-z0-9]{2,8};/i", "", $content);
//            Remove \r\n
            $content = str_replace("\r\n", "", $content);

            $record['body'] = $content;

            $result['message'] = $record;
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
        $result = Myclass::addFeedback($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionGetmood() {

        $result['success'] = 1;
        $record[0] = (array) $model->attributes;
        $record[0]['mood_ids'] = array_values(CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_id'));
        $record[0]['mood_name'] = array_values(CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_type'));
        $record[0]['mood_img_name'] = array_values(CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_image'));
        $result['message'] = $record;

        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionGetcategories() {
        $model = Users::model()->findByAttributes(array('user_email' => $_REQUEST['user_id']));
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No categories found!!!';
        } else {
            $result['success'] = 1;
            $user_id = $model->user_id;
            $criteria = new CDbCriteria();
            $criteria->addInCondition('user_id', array(0, $user_id));
            $cat_results = Category::model()->findAll($criteria);
            $record[0]['cat_ids'] = array_values(CHtml::listData($cat_results, 'category_id', 'category_id'));
            $record[0]['cat_name'] = array_values(CHtml::listData($cat_results, 'category_id', 'category_name'));

            $result['message'] = $record;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionUsercategories() {
        $model = Users::model()->findByAttributes(array('user_id' => $_REQUEST['user_id']));
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $user_id = $model->user_id;
            $criteria = new CDbCriteria();
            $criteria->addInCondition('user_id', array($user_id));
            $cat_results = Category::model()->findAll($criteria);
            $record[0]['cat_ids'] = array_values(CHtml::listData($cat_results, 'category_id', 'category_id'));
            $record[0]['cat_name'] = array_values(CHtml::listData($cat_results, 'category_id', 'category_name'));

            $result['message'] = $record;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionEditcategory() {
        $model = Category::model()->findByPk($_REQUEST['category_id']);
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No entries found!!!';
        } else {
            $result['success'] = 1;
            $model->category_name = $_REQUEST['category_name'];
            $model->save();
            $result['message'] = 'Succesfully Updated.';
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionDeletecategory() {
        $criteria = new CDbCriteria();
        $criteria->with = array('catUser');
        $criteria->addCondition("catUser.user_email = '" . $_REQUEST['user_id'] . "'");
        $criteria->addCondition("t.category_id = '" . $_REQUEST['category_id'] . "'");
        $model = Category::model()->find($criteria);

        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No categories found!!!';
        } else {
            $model->delete();
            $result['success'] = 1;
            $result['message'] = 'Succesfully deleted.';
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionGetfaq() {

        $model = Faq::model()->findAll();
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No Faq found!!!';
        } else {
            $result['success'] = 1;
            $result['message'] = $model;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionSubmitmood() {

        $params = $_REQUEST;

        $result = Myclass::addSubmitmood($params);
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionCheckuser() {

        $params = $_REQUEST;
        $count = Users::model()->count("user_email = '{$params['email']}'");
        if ($count) {
            $result['success'] = 1;
            $result['message'] = 'Registered';
        } else {
            $result['success'] = 0;
            $result['message'] = 'Guest';
        }

        echo CJSON::encode($result);
        Yii::app()->end();
    }

    public function actionMyprofile() {

        $model = Users::model()->findAllByAttributes(array('user_email' => $_REQUEST['email']));
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No User found!!!';
        } else {
            $result['success'] = 1;
            $result['message'] = $model;
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionUpdateprofile() {


        $model = Users::model()->findByPk($_REQUEST[user_id]);
        $old_name = $model->user_prof_image;

        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/prof_img/";
        if (!empty($model)) {
            $model->user_name = $_REQUEST[profileName];
            $model->user_email = $_REQUEST[profileMail];
        }

        if (!empty($_FILES['image']))
            $model->user_prof_image = CUploadedFile::getInstanceByName('image');

        if (!empty($model->user_prof_image)) {
            $name = $model->user_prof_image->getName();
            $filename = time() . '_' . $_REQUEST[user_id] . '_' . $name;
            $model->user_prof_image->saveAs($path . $filename);
            if (!empty($old_name)) {
                unlink($path . $old_name);
            }
            $model->user_prof_image = $filename;
        } else {
            $model->user_prof_image = $old_name;
        }
        $result = Myclass::updateUser($model);

        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionUpdatepassword() {

        $model = Users::model()->findByAttributes(array('user_email' => $_REQUEST['email']));
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No User found!!!';
        } else {
            $old_password = Myclass::encrypt($_REQUEST['old_password']);
            if ($old_password == $model->user_password) {

                $new_password = Myclass::encrypt($_REQUEST['new_password']);
                $model->user_password = $new_password;
                $model->save(false);
                $result['success'] = 1;
                $result['message'] = 'Your password updated succesfully';
            } else {
                $result['success'] = 0;
                $result['message'] = 'Your old password does not match!!!';
            }
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    /*
     * Parametes
     * @date
     * @time
     * @mail
     * @message
     */

    public function actionAddtodo() {
        $result = array();
        $params = $_REQUEST;

        if ($params['todo_id']) {
            $model = Todolist::model()->findByPk($params['todo_id']);
        } elseif (!$model) {
            $model = new Todolist;
        }

        $params['reminder_time'] = date("Y-m-d H:i:s", strtotime("{$params['date']} {$params['time']}"));
        $params['user_id'] = Users::model()->findByAttributes(array('user_email' => $params['mail']))->user_id;

        if ($params['user_id']) {
            $model->attributes = $params;
            $model->save(false);

            $result['success'] = 1;
            $result['pref_date'] = date('Y-m-d', strtotime($model->reminder_time));
            $result['message'] = 'Successfully added.';
        } else {
            $result['success'] = 0;
            $result['message'] = 'Error !!!';
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

    public function actionGettodo() {
        $todo_date = trim($_REQUEST['pref_date']);
        $todo_mail = trim($_REQUEST['mail']);

        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('user');
        $criteria->addCondition("user.user_email = '{$todo_mail}'");
        if (isset($_REQUEST['pref_date']))
            $criteria->addCondition("DATE(t.reminder_time) = '{$todo_date}'");

        $criteria->limit = 50;

        $criteria2 = clone $criteria;

        $criteria->addCondition("t.status = 1");
        $criteria->order = 't.reminder_time ASC';
        $activeModel = Todolist::model()->findAll($criteria);

        $criteria2->addCondition("t.status = 2");
        $criteria2->order = 't.reminder_time DESC';
        $completeModel = Todolist::model()->findAll($criteria2);
        if (!$activeModel && !$completeModel) {
            $result['success'] = 0;
            $result['message'] = 'No todo"s found!!!';
        } else {
            $result['success'] = 1;
            $record = array();
            foreach ($activeModel as $i => $data) {
                $record[$i] = (array) $data->attributes;
            }
            $recordComplte = array();
            foreach ($completeModel as $i => $data) {
                $recordComplte[$i] = (array) $data->attributes;
            }
            $result['active_todo'] = $record;
            $result['complete_todo'] = $recordComplte;
        }

        echo CJSON::encode($result);
        Yii::app()->end();
    }

    public function actionDeletetodo() {
        $todo_id = trim($_REQUEST['todo_id']);
        $todo_mail = trim($_REQUEST['mail']);

        $criteria = new CDbCriteria();
        $criteria->select = array('t.*');
        $criteria->with = array('user');
        $criteria->addCondition("user.user_email = '$todo_mail'");
        $criteria->addCondition("t.id = '$todo_id'");

        $model = Todolist::model()->find($criteria);
        $result = array();
        if (!$model) {
            $result['success'] = 0;
            $result['message'] = 'No todo"s found!!!';
        } else {
            $model->delete(false);
            $result['success'] = 1;
            $result['message'] = 'Succesfully deleted.';
        }
        echo CJSON::encode($result);

        Yii::app()->end();
    }

}
