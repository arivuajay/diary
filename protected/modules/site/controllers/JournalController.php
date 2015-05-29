<?php

Yii::import('ext.tinymce.*');

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
            'compressor' => array(
                'class' => 'TinyMceCompressorAction',
                'settings' => array(
                    'compress' => true,
                    'disk_cache' => true,
                )
            ),
            'spellchecker' => array(
                'class' => 'TinyMceSpellcheckerAction',
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
                'actions' => array('index', 'spellchecker'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'dashboard', 'calendarevents', 'listjournal', 'liststudentjournal', 'adddiaryimage', 'addFile', 'view', 'search', 'getsubjects'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions'=>array('view'),
//                'expression'=> Yii::app()->user->isAdmin(),
//            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);

        if (empty($model) || $model->diary_user_id != Yii::app()->user->id) {
            Yii::app()->user->setFlash('danger', "Wrong url");
            $this->redirect(array('dashboard'));
        }

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($date = null) {
        if (@$_COOKIE['diary_mode'] == '2'):
            $model = new StudentDiary('create');
        else:
            $model = new Diary('create');
        endif;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Diary'])) {
            $new_category = ($_POST['Diary']['diary_category_id'] == 'others');
            if ($new_category == true) {
                //temp validation
                $_POST['Diary']['category_id'] = 0;
            }
            !isset($_POST['Diary']['diary_description']) ? $_POST['Diary']['diary_description'] = '' : '';
            !isset($_POST['Diary']['diary_user_mood_id']) ? $_POST['Diary']['diary_user_mood_id'] = '' : '';

            $model->attributes = $_POST['Diary'];

            if ($model->validate()) {
                if ($new_category == true) {
                    $catmodel = new Category();
                    $catmodel->setAttribute('category_name', $_POST['Diary']['diary_category']);
                    $catmodel->setAttribute('user_id', Yii::app()->user->id);
                    $catmodel->save(false);
                    $model->setAttribute('diary_category_id', $catmodel->category_id);
                }
                $model->save(false);
                $diary_images = $_SESSION['diary_images'];

                if (!empty($diary_images)):
                    foreach ($diary_images as $image):
                        $imgModel = new DiaryImage();
                        $imgModel->diary_id = $model->diary_id;
                        $imgModel->diary_image = $image;
                        $imgModel->save(false);
                    endforeach;
                endif;
                unset($_SESSION['diary_images']);
                $_SESSION['back'] = 1;
                Yii::app()->user->setFlash('success', "Your Journal added Successfully.");
                $this->redirect(array('view', 'id' => $model->diary_id));
            }
        } else if (isset($_POST['StudentDiary'])) {
            $model->attributes = $_POST['StudentDiary'];
            if ($model->validate()) {
                if (!is_numeric($model->diary_class_id)) {
                    $catmodel = new StudentDiaryClass();
                    $catmodel->class_name = ($model->diary_class_id == 'others') ? $model->diary_class : $model->diary_class_id;
                    $catmodel->user_id = Yii::app()->user->id;
                    $catmodel->save(false);
                    $model->diary_class_id = $catmodel->class_id;
                }

                if (!is_numeric($model->diary_subject_id)) {
                    $submodel = new StudentDiarySubject();
                    $submodel->subject_name =  ($model->diary_subject_id == 'others') ? $model->diary_subject : $model->diary_subject_id;
                    $submodel->class_id = $model->diary_class_id;
                    $submodel->user_id = Yii::app()->user->id;
                    $submodel->save(false);
                    $model->diary_subject_id = $submodel->subject_id;
                }

                $model->save(false);

                $diary_images = $_SESSION['diary_images'];
                if (!empty($diary_images)):
                    foreach ($diary_images as $image):
                        $imgModel = new StudentDiaryImage();
                        $imgModel->diary_id = $model->diary_id;
                        $imgModel->diary_image = $image;
                        $imgModel->save(false);
                    endforeach;
                endif;

                unset($_SESSION['diary_images']);
                $_SESSION['back'] = 1;
                Yii::app()->user->setFlash('success', "Your Journal added Successfully.");
                $this->redirect(array('/site/journal/liststudentjournal'));
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
        $this->performAjaxValidation($model);

        if (isset($_POST['Diary'])) {
            $new_category = ($_POST['Diary']['diary_category_id'] == 'others');
            if ($new_category == true) {
                //temp validation
                $_POST['Diary']['category_id'] = 0;
            }
            $model->attributes = $_POST['Diary'];
            if ($model->validate()) {
                if ($new_category == true) {
                    $catmodel = new Category();
                    $catmodel->setAttribute('category_name', $_POST['Diary']['diary_category']);
                    $catmodel->setAttribute('user_id', Yii::app()->user->id);
                    $catmodel->save(false);
                    $model->setAttribute('diary_category_id', $catmodel->category_id);
                }
                $model->save(false);
                DiaryImage::model()->deleteAll("diary_id = '{$model->diary_id}'");
                $diary_images = $_SESSION['diary_images'];
                if (!empty($diary_images)):
                    foreach ($diary_images as $image):
                        $imgModel = new DiaryImage();
                        $imgModel->diary_id = $model->diary_id;
                        $imgModel->diary_image = $image;
                        $imgModel->save(false);
                    endforeach;
                endif;
                unset($_SESSION['diary_images']);
                $_SESSION['back'] = 1;
                $this->redirect(array('view', 'id' => $model->diary_id));
            }
        } else {
            unset($_SESSION['diary_images']);
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
        if (isset($_POST ['ajax']) && $_POST ['ajax'] === 'diary-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDashboard() {
        $this->render('myCalendar');
    }

    public function actionCalendarevents() {
        $myDiary = Diary::model()->mine()->findAll(array('order' => 'created DESC'));
        $limit = 10;
        $date = array();
        foreach ($myDiary as $diary) {
            if (isset($date[strtotime($diary->diary_current_date)])) {
                $date[strtotime($diary->diary_current_date)] = $date[strtotime($diary->diary_current_date)] + 1;
            } else {
                $date[strtotime($diary->diary_current_date)] = 1;
            }

            if ($date[strtotime($diary->diary_current_date)] <= $limit) {
                $items[] = array(
                    'state' => 'TRUE',
                    'title' => $diary->diary_title,
                    'start' => date('Y-m-d', strtotime($diary->diary_current_date)),
                    'color' => '#95e5e7',
                    //                'start' => $diary->diary_current_date,
                    'url' => $this->createUrl('/site/journal/listjournal', array('date' => date('Y-m-d', strtotime($diary->diary_current_date))))
                );
            }
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
                if ($_GET["file"] [0] !== '.') {
                    $file = $path . $_GET["file"];
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                DiaryImage::model()->deleteAll("diary_image = '{$_GET["file"]}'");
                $key = array_search(@$_GET["file"], @$_SESSION['diary_images']);
                unset($_SESSION['diary_images'][$key]);
                echo json_encode(array(true, 'file' => $_GET["file"], 'file2' => $file));
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
                $fname = $model->name;
                $fn = explode('.', $fname);
                //(optional) Generate a random name for our file
                $filename = md5(Yii::app()->user->id . microtime()) . '_' . $fn[0];
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
                            "delete_url" => $this->createUrl("adddiaryimage", array(
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
                    Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger:: LEVEL_ERROR, "xupload.actions.XUploadAction"
                    );
                }
            } else {
                throw new CHttpException(500, "Could not upload file");
            }
        }
    }

    public function actionSearch() {

        $model = new Diary('search');
//        echo '<pre>';
//        print_r($_GET);exit;
        if (isset($_GET['search']))

        //send model object for search
            $this->render('search_view', array(
//            'dataProvider' => $model->customsearch(),
                'model' => $model->customsearch())
            );
    }

    public function actionGetsubjects() {
        $class = $_REQUEST['class'];
        $uid = Yii::app()->user->id;
        $result = array();
        $data = StudentDiarySubject::model()->findAll("class_id = '$class' AND user_id = '$uid'");
        if ($data) {
            $result = CHtml::listData($data, 'subject_id', 'subject_name');
            $result['others'] = 'Others';
        }

        echo CJSON::encode($result);
        Yii::app()->end();
    }

    public function actionListstudentjournal() {
        $journalList = StudentDiary::model()->mine()->findAll();
        $this->render('liststudentjournal', compact('journalList'));
    }

}
