<?php

class JournalController extends Controller {

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
                'actions' => array('index', 'view'),
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Diary('create');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $path = Yii::app()->basePath . '/../uploads';
        if (!is_dir($path)) {
            mkdir($path);
        }

        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../uploads/"; // path to the uploads folder

        if (isset($_POST['Diary'])) {
            $model->attributes = $_POST['Diary'];
            //print_r($_POST['Diary']);exit;
            $model->diary_user_id = Yii::app()->user->id;
            $curr_timestamp = strtotime($_POST['Diary']['diary_current_date']);
            $model->diary_current_date = date('Y-m-d H:i:s', $curr_timestamp);
            $model->created = date('Y-m-d H:i:s');
            $model->modified = date('Y-m-d H:i:s');
            $model->diary_upload = CUploadedFile::getInstance($model, 'diary_upload');
            $fileName = time() . '_' . str_replace(' ', '_', strtolower($model->diary_upload));
//            if (@!empty($_FILES['Diary']['name']['diary_upload'])) {
//                $model->diary_upload = $_POST['Diary']['diary_upload'];
//
//                if ($model->validate(array('diary_upload'))) {
//                    $model->diary_upload = CUploadedFile::getInstance($model, 'diary_upload');
//                } else {
//                    $model->diary_upload = '';
//                }
//
//                $model->diary_upload->saveAs($path . '/' . $fileName);
//            }
            if ($model->diary_upload) {
                $model->diary_upload->saveAs($path . '/' . $fileName);
            }

            $model->diary_upload = $fileName;

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->diary_id));
            }
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
        $model->setScenario('update');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Diary'])) {
            $model->attributes = $_POST['Diary'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->diary_id));
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
        $dataProvider = new CActiveDataProvider('Diary');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Diary('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Diary']))
            $model->attributes = $_GET['Diary'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Diary the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Diary::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Diary $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'diary-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
