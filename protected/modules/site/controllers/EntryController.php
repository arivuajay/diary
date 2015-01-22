<?php

class EntryController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/frontinner';

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
                'actions' => array('create', 'index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (!Yii::app()->user->isGuest)
            $this->redirect(array('/site/journal/create'));

        $model = new Entry;
        $model_register = new Users('register');
        if (isset($_POST['email'])) {
            $userModel = Users::model()->findByAttributes(array('user_email' => $_POST['email']));
            Yii::app()->session['temp_user_mail'] = $_POST['email'];
            Yii::app()->session['temp_user_mood'] = $_POST['MoodType']['mood_type'];
            // print_r($_POST);exit;
            if (!empty($userModel)) {
                $this->redirect(array('users/login'));
            }
            /////////////////////////////
            $this->render('create', array(
                'model' => $model,
            ));
            /////////////////////////////
        }

        // echo 'hi';
        // print_r($_POST);exit;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Entry'])) {



            //register and send mail..
            //auto registration for new user.....
            //echo 'auto register process';

            $string = Yii::app()->session['temp_user_mail'];
            $result = explode('@', $string);
            $model_register->user_name = $result[0];
            $model_register->user_email = Yii::app()->session['temp_user_mail'];
            $model_register->user_password = Myclass::getRandomString();
            $pass_for_mail = $model_register->user_password;
            $activation_key = Myclass::getRandomString();
            $model_register->user_activation_key = $activation_key;
            //$model->created = date('Y-m-d H:i:s');
            //$model->modified = date('Y-m-d H:i:s');

            if ($model_register->save(false)) {
                // echo $model_register->user_email;exit;
                $mail = new Sendmail;
                $message = '<p>Dear ' . $model_register->user_name . '</p>';
                $message .= '<p>Thank you for your intrest, we just need to verify your email address</p>';
                $message .= '<p><a href="' . $_SERVER['HTTP_HOST'] . Yii::app()->baseUrl . '/site/users/temporary?activationkey=' . $model_register->user_activation_key . '&userid=' . $model_register->user_id . '">Click Here to activate</a></p><br />';
                $message .= "<p>If you can't click the button above, you can verify your email address by copying and pasting (or typing) the following address into your browser:</p>";
                $message .= '<p><a href="' . $_SERVER['HTTP_HOST'] . Yii::app()->baseUrl . '/site/users/temporary?activationkey=' . $model_register->user_activation_key . '&userid=' . $model_register->user_id . '">' . $_SERVER['HTTP_HOST'] . Yii::app()->baseUrl . '/site/users/temporary?activationkey=' . $model_register->user_activation_key . '&userid=' . $model_register->user_id . '</a></p><br />';
                $message .= '<p>After verify you can login using following details.</p>';
                $message .= '<p>Username :' . $model_register->user_email . '</p>';
                $message .= '<p>Password :' . $pass_for_mail . '</p>';
                $Subject = CHtml::encode(Yii::app()->name) . ': Confirmation your email';
                $mail->send($model_register->user_email, $Subject, $message);

                $path = Yii::app()->basePath . '/../uploads';
                if (!is_dir($path)) {
                    mkdir($path);
                }

                $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
                $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/uploads/"; // URL for the uploads folder
                $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../uploads/"; // path to the uploads folder
                $model->attributes = $_POST['Entry'];
                ///echo 'test'; exit;

                $model->temp_activation_key =  $activation_key;
                    $curr_timestamp = strtotime($_POST['Entry']['temp_current_date']);
                    $model->temp_current_date = date('Y-m-d H:i:s', $curr_timestamp);
                    $model->created = date('Y-m-d H:i:s');
                    $model->modified = date('Y-m-d H:i:s');
                if (@!empty($_FILES['Entry']['name']['temp_upload'])) {
                    $model->temp_upload = $_POST['Entry']['temp_upload'];

                    if ($model->validate(array('temp_upload'))) {
                        $model->temp_upload = CUploadedFile::getInstance($model, 'temp_upload');
                    } else {
                        $model->temp_upload = '';
                    }

                    $model->temp_upload->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->temp_upload)));
                }

                $model->temp_upload = time() . '_' . str_replace(' ', '_', strtolower($model->temp_upload));
                if ($model->save()) {

                    //redirect home check mail and active ......
                   Yii::app()->user->setFlash('success', "Please check your mail for activation");
                $this->redirect(Yii::app()->baseUrl);
                }
            }
        } else {
            $this->redirect(Yii::app()->baseUrl);
        }


        /////////////////////////////
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

        if (isset($_POST['Entry'])) {
            $model->attributes = $_POST['Entry'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->temp_id));
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
        $dataProvider = new CActiveDataProvider('Entry');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Entry('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Entry']))
            $model->attributes = $_GET['Entry'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Entry the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Entry::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Entry $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'entry-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
