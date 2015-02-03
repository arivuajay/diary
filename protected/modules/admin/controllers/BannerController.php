<?php

class BannerController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//	public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
//            'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view', 'changestatus', 'filepathcreate'),
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
        $model = new Banner;
        $model->setScenario('create');
        // Uncomment the following line if AJAX validation is needed
        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/banners/";
        $this->performAjaxValidation($model);

        if (isset($_POST['Banner'])) {
            isset($_POST['Banner']['banner_status']) ? $_POST['Banner']['banner_status'] = 1 : $_POST['Banner']['banner_status'] = 0; 
            $model->attributes = $_POST['Banner'];
            $model->banner_image = CUploadedFile::getInstance($model, 'banner_image');

            $layout = BannerLayout::model()->findByPk($model->banner_layout_id);
            $dimensions = explode('*', $layout->banner_layout_dimensions);
            $model->setAttribute('banner_width', $dimensions[0]);
            $model->setAttribute('banner_height', $dimensions[1]);
            $banner_path = $this->actionFilepathcreate($layout, $dimensions);
            $model->setAttribute('banner_path', $banner_path);

            if ($model->validate()) {
                if ($model->banner_image !== null) {
                    $name = $model->banner_image->getName();
                    $filename = time() . '_' . $name;
                    $model->banner_image->saveAs($path . $banner_path . $filename);
                }
                $model->banner_image = $filename;
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Banner Added successfully.');
//                $this->redirect(array('view', 'id' => $model->banner_id));
                $this->redirect(array('create'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionFilepathcreate($layout, $dimensions) {
        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/banners/";
        $banner_path = $path . $layout->banner_layout_page;
        $banner_layout_dimensions = $dimensions[0] . 'x' . $dimensions[1];

        if (!file_exists($banner_path)) {
            mkdir($banner_path, 0777, true);
            $banner_path = $path . $layout->banner_layout_page . '/' . $layout->banner_layout_position;
            if (!file_exists($banner_path)) {
                mkdir($banner_path, 0777, true);
                $banner_path = $path . $layout->banner_layout_page . '/' . $layout->banner_layout_position . '/' . $banner_layout_dimensions;
                if (!file_exists($banner_path)) {
                    mkdir($banner_path, 0777, true);
                }
            }
        } else {
            $banner_path = $path . $layout->banner_layout_page . '/' . $layout->banner_layout_position;
            if (!file_exists($banner_path)) {
                mkdir($banner_path, 0777, true);
                $banner_path = $path . $layout->banner_layout_page . '/' . $layout->banner_layout_position . '/' . $banner_layout_dimensions;
                if (!file_exists($banner_path)) {
                    mkdir($banner_path, 0777, true);
                }
            } else {
                $banner_path = $path . $layout->banner_layout_page . '/' . $layout->banner_layout_position . '/' . $banner_layout_dimensions;
                if (!file_exists($banner_path)) {
                    mkdir($banner_path, 0777, true);
                }
            }
        }
        return $layout->banner_layout_page . '/' . $layout->banner_layout_position . '/' . $banner_layout_dimensions . '/';
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

        if (isset($_POST['Banner'])) {
            isset($_POST['Banner']['banner_status']) ? $_POST['Banner']['banner_status'] = 1 : $_POST['Banner']['banner_status'] = 0; 
            $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/banners/";
            $old_image = $model->banner_image;
            $old_path = $model->banner_path;
            
            $model->attributes = $_POST['Banner'];
            $model->banner_image = CUploadedFile::getInstance($model, 'banner_image');

            $layout = BannerLayout::model()->findByPk($model->banner_layout_id);
            $dimensions = explode('*', $layout->banner_layout_dimensions);
            $model->setAttribute('banner_width', $dimensions[0]);
            $model->setAttribute('banner_height', $dimensions[1]);
            $banner_path = $this->actionFilepathcreate($layout, $dimensions);
            $model->setAttribute('banner_path', $banner_path);

            if ($model->validate()) {
                if ($model->banner_image !== null) {
                    $name = $model->banner_image->getName();
                    $filename = time() . '_' . $name;
                    $model->banner_image->saveAs($path . $banner_path . $filename);
                    
                    if(file_exists($path.$old_path.$old_image)){
                        unlink($path.$old_path.$old_image);
                    }
                    $model->banner_image = $filename;
                    $model->banner_path = $banner_path;
                }else{
                    $model->banner_image = $old_image;
                    $model->banner_path = $old_path;
                }
                if ($model->save(false))
                    Yii::app()->user->setFlash('success', 'Banner Updated successfully.');
                    $this->redirect(array('index'));
    //                $this->redirect(array('view', 'id' => $model->banner_id));
            }
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
        $model = $this->loadModel($id);
        $this->loadModel($id)->delete();
        
        $path = realpath(Yii::app()->getBasePath() . "/../") . "/themes/site/image/banners/";
        if(file_exists($path.$model->banner_path.$model->banner_image)){
            unlink($path.$model->banner_path.$model->banner_image);
        }


        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
//            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Banner');
        $banners = Banner::model()->findAll();
        $this->render('index', array(
            'banners' => $banners
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Banner('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Banner']))
            $model->attributes = $_GET['Banner'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Banner the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Banner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Banner $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionChangestatus($id) {
        $banner = $this->loadModel($id);
        $banner->banner_status = ($banner->banner_status == 0) ? 1 : 0;
        if ($banner->save(false)) {
            $banner->banner_status == 0 ? $status = 'In-Active' : $status = 'Active';
            echo '"' . $banner->banner_title . '" status: ' . $status;
        } else {
            echo 'Error while changing status !!!';
        }
    }

}
