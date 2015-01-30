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

    public function actions() {
        return array(
            'upload' => array(
                'class' => 'xupload.actions.XUploadAction',
                'path' => Yii::app()->getBasePath() . "/.." . JOURNAL_IMG_PATH,
                'publicPath' => Yii::app()->getBaseUrl() . JOURNAL_IMG_PATH,
            ),
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
                'actions' => array('create', 'update', 'dashboard', 'calendarevents', 'listjournal', 'adddiaryimage', 'addFile'),
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

    public function actionAddFile() {
        Yii::import("ext.xupload.models.XUploadForm");
        $model = new XUploadForm;
        $this->renderPartial('uploadFile', array('model' => $model));
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
    public function actionCreate($date = null) {
        $model = new Diary('create');

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../uploads/"; // path to the uploads folder

        if (isset($_POST['Diary'])) {
            var_dump($_SESSION['diary_images']); exit;
            $new_category = $_POST['Diary']['diary_category_id'] == 'others';
            if ($new_category == true) {
                //temp validation
                $_POST['Diary']['category_id'] = 0;
            }
            $model->attributes = $_POST['Diary'];
            if ($model->validate()) {
                if ($new_category == true) {
                    $catmodel = new Category();
                    $catmodel->setAttribute('category_name', $_POST['Diary']['diary_category']);
                    $catmodel->save(false);
                    $model->setAttribute('diary_category_id', $catmodel->category_id);
                }
                $model->save(false);
                $this->redirect(array('view', 'id' => $model->diary_id));
            }
        } else {
            unset($_SESSION['diary_images']);
            $curr_date = date("Y/m/d");
            $model->diary_current_date = date(PHP_SHORT_DATE_FORMAT, strtotime($curr_date));
            if ($date)
                $model->diary_current_date = date(PHP_SHORT_DATE_FORMAT, strtotime($date));
            $model->diary_user_mood_id = Yii::app()->session['temp_user_mood'];
        }


        $this->render('create', array(
            'model' => $model
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

    public function actionDashboard() {
        $this->render('myCalendar');
    }

    public function actionCalendarevents() {
        foreach ($myDiary as $diary) {
            $items[] = array(
                'state' => 'TRUE',
                'title' => "See date journal",
                'start' => $diary->diary_current_date,
//                'url' => $this->createUrl('/site/journal/listjournal', array('date' => date('Y-m-d',  strtotime($diary->diary_current_date))))
            );
        }

        echo CJSON::encode($items);
        Yii::app()->end();
    }

    public function actionListjournal($date = null) {
        $journalList = Diary::model()->mine()->findAll("DATE(diary_current_date) = '$date'");
        $this->render('listjournal', compact('journalList'));
    }

    public function actionAdddiaryimage() {
        Yii::import("xupload.models.XUploadForm");
        //Here we define the paths where the files will be stored temporarily
        $path = realpath(Yii::app()->getBasePath() . "/../" . JOURNAL_IMG_PATH) . "/";
        $publicPath = Yii::app()->getBaseUrl() . "/" . JOURNAL_IMG_PATH;

        //This is for IE which doens't handle 'Content-type: application/json' correctly
        header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            header('Content-type: application/json');
        } else {
            header('Content-type: text/plain');
        }

        //Here we check if we are deleting and uploaded file
        if (isset($_GET["_method"])) {
            if ($_GET["_method"] == "delete") {
                if ($_GET["file"][0] !== '.') {
                    $file = $path . $_GET["file"];
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                echo json_encode(true);
            }
        } else {
            $model = new XUploadForm;
            $model->file = CUploadedFile::getInstance($model, 'file');
            //We check that the file was successfully uploaded
            if ($model->file !== null) {
                //Grab some data
                $model->mime_type = $model->file->getType();
                $model->size = $model->file->getSize();
                $model->name = $model->file->getName();
                //(optional) Generate a random name for our file
                $filename = md5(Yii::app()->user->id . microtime() . $model->name);
                $filename .= "." . $model->file->getExtensionName();
                if ($model->validate()) {
                    //Move our file to our temporary dir
                    $model->file->saveAs($path . $filename);
                    chmod($path . $filename, 0777);
                    //here you can also generate the image versions you need
                    //using something like PHPThumb
//                    Yii::import("ext.EPhpThumb.EPhpThumb");
//                    $thumb = new EPhpThumb();
//                    $thumb->init(); //this is needed
//                    //chain functions
//                    $thumb->create($path . $filename)->adaptiveResize(144, 192)->save($path . "large/" . $filename);
//                    $thumb->create($path . $filename)->adaptiveResize(71, 71)->save($path . $filename);
                    $_SESSION['diary_images'][] = $filename;
//                    $prod_image = new ProductImages;
//                    $prod_image->prod_id = $_REQUEST['prodid'];
//                    $prod_image->prod_image = $filename;
//                    $prod_image->save(false);
                    //We do so, using the json structure defined in
                    // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                    echo json_encode(array(array(
                            "name" => $model->name,
                            "type" => $model->mime_type,
                            "size" => $model->size,
                            "url" => $publicPath . "large/" . $filename,
                            "thumbnail_url" => $publicPath . $filename,
                            "delete_url" => $this->createUrl("upload", array(
                                "_method" => "delete",
                                "file" => $filename
                            )),
                            "delete_type" => "POST"
                    )));
                } else {
                    //If the upload failed for some reason we log some data and let the widget know
                    echo json_encode(array(
                        array("error" => $model->getErrors('file'),
                    )));
                    Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
                    );
                }
            } else {
                throw new CHttpException(500, "Could not upload file");
            }
        }
    }

}
