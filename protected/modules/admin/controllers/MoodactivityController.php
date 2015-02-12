<?php

class MoodactivityController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'Report_status', 'Dailymoodreport'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionReport_status() {


        $model = new AdminSetting;
        if (!empty($_GET)) {
            $mood_report = AdminSetting::model()->findByAttributes(array('setting_name' => 'mood_report_mail'));
            $mood_report->attributes = array('status' => $_GET['status']);
            if ($mood_report->save()) {
                Yii::app()->user->setFlash('success', 'Report status changed successfully');
                $this->redirect(array('index'));
            }
        }
    }

    public function actionDailymoodreport() {
        $all_mood_genrated = MoodActivity::model()->findAll();
        $user_email_dis = MoodActivity::model()->findAll(array(
            'select' => 't.mood_activity_email',
            'distinct' => true,
        ));
        $all_moods = MoodType::model()->findAll();
        
         
        foreach($user_email_dis as $user_email)
        {
            echo $user_email->mood_activity_email.'-----';
            foreach($all_moods as $mood_type){
        // $count = MoodActivity::Model()->count("mood_activity_mood_id=:mood_activity_mood_id", array("mood_activity_mood_id" => $mood_type->mood_id));
        $count=MoodActivity::model()->countByAttributes(array(
                        'mood_activity_email'=>$user_email->mood_activity_email,
                        'mood_activity_mood_id'=>$mood_type->mood_id,
                ));
                echo $mood_type->mood_id.'----'.$count.'----';
        }
           
        }
//        echo '<pre>';
//        print_r($user_email_dis);

//        $mail_users = array();
//        $all_moods = MoodType::model()->findAll();
//        foreach ($all_mood_genrated as $mood_genrated) {
//            if(!isset($mail_users[$mood_genrated->mood_activity_email])){$mail_users[$mood_genrated->mood_activity_email] = '';}
//            foreach ($all_moods as $mood) {
//                if ($mood_genrated->mood_activity_mood_id == $mood->mood_id) {
//                    echo $mood->mood_type.'-----';
//                    if(isset($mail_users[$mood_genrated->mood_activity_email][$mood->mood_type])) {
//                      $mail_users[$mood_genrated->mood_activity_email][$mood->mood_type] = $mail_users[$mood_genrated->mood_activity_email][$mood->mood_type]+1;
//                    } else {
//                        $mail_users[$mood_genrated->mood_activity_email] = array($mood->mood_type => 1 );
//                    }
//                }
//            }
//        }
//        echo '<pre>';
//        print_r($mail_users);
//        echo '<pre>';
//        print_r($all_mood_genrated);
        exit;
//        $report_status = CHtml::listData(AdminSetting::model()->findAllByAttributes(array('setting_name' => 'mood_report_mail')), 'setting_name', 'status');
//        if ($report_status['mood_report_mail'] == 1) {

            //if (!empty($model->user_email)):
            //$loginlink = Yii::app()->createAbsoluteUrl('/site/default/login');
//            $mail = new Sendmail;
//            $trans_array = array(
//                "{SITENAME}" => SITENAME,
//                "{USERNAME}" => $model->user_name,
//                "{EMAIL_ID}" => $model->user_email,
//                "{NEXTSTEPURL}" => $confirmationlink,
//            );
//            $message = $mail->getMessage('registration', $trans_array);
//            $Subject = $mail->translate('Confirmation Mail From {SITENAME}');
//            $mail->send($model->user_email, $Subject, $message);
            // endif;
//        }
    }

    public function actionWeeklymoodreport() {
        $report_status = CHtml::listData(AdminSetting::model()->findAllByAttributes(array('setting_name' => 'mood_report_mail')), 'setting_name', 'status');
        if ($report_status['mood_report_mail'] == 2) {
            
        }
    }

    public function actionMonthlymoodreport() {
        $report_status = CHtml::listData(AdminSetting::model()->findAllByAttributes(array('setting_name' => 'mood_report_mail')), 'setting_name', 'status');
        if ($report_status['mood_report_mail'] == 3) {
            
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new MoodActivity;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MoodActivity'])) {
            $model->attributes = $_POST['MoodActivity'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->mood_activity_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['MoodActivity'])) {
            $model->attributes = $_POST['MoodActivity'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->mood_activity_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('MoodActivity');
        $Criteria = new CDbCriteria();
        $Criteria->order = 'mood_activity_id DESC';
        $mood_activities = MoodActivity::model()->findAll($Criteria);

        $this->render('index', array(
            'mood_activities' => $mood_activities,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MoodActivity('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MoodActivity']))
            $model->attributes = $_GET['MoodActivity'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MoodActivity the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MoodActivity::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MoodActivity $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mood-activity-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
