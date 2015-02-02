<?php

class MoodTypeController extends Controller {
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
        $model = new MoodType;
        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/mood_type/";
        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
        //We check that the file was successfully uploaded

        if (isset($_POST['MoodType'])) {
            $model->attributes = $_POST['MoodType'];
            $model->mood_image = CUploadedFile::getInstance($model, 'mood_image');
            if ($model->validate()) {
                if ($model->mood_image !== null) {
                    $name = $model->mood_image->getName();
                    $filename = time() . '_' . $name;
                    $model->mood_image->saveAs($path . $filename);
                }
                $model->mood_image = $filename;
                $model->save(false);
                 Yii::app()->user->setFlash('success', 'Mood Type Added successfully.');
                $this->redirect(array('index'));
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
        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/mood_type/";
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['MoodType'])) {
            $old_name = $model->mood_image;
            $model->attributes = $_POST['MoodType'];
            $model->mood_image = CUploadedFile::getInstance($model, 'mood_image');
            if ($model->validate()) {
                //We check that the file was successfully uploaded
                if ($model->mood_image !== null) {
                    $name = $model->mood_image->getName();
                    $filename = time() . '_' . $name;
                    $model->mood_image->saveAs($path . $filename);
                    $model->mood_image = $filename;
                } else {
                    $model->mood_image = $old_name;
                }

                $model->save(false);
                Yii::app()->user->setFlash('success', 'Mood Type Updated successfully.');
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
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
        $dataProvider = new CActiveDataProvider('MoodType');
        $moods = MoodType::model()->findAll();

        $this->render('index', array(
            'moods' => $moods,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new MoodType('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['MoodType']))
            $model->attributes = $_GET['MoodType'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return MoodType the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = MoodType::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param MoodType $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mood-type-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
