<?php

class CmsController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
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
                'actions' => array('viewpage'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'createpage', 'updatepage', 'deletepage','menus', 'createmenu', 'updatemenu', 'deletemenu','links', 'createlink', 'updatelink', 'deletelink'),
                'users' => array('@'),
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
    public function actionViewpage($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatepage() {
        $model = new Cms;

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if (isset($_POST['Cms'])) {
            $model->attributes = $_POST['Cms'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page created successfully.');
                $this->redirect(array('index'));
            }
        }

        $this->render('_form', compact('model'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatepage($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Cms'])) {
            $model->attributes = $_POST['Cms'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page updated successfully.');
                $this->redirect(array('index'));
            }
        }

        $this->render('_form', compact('model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletepage($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $pages = Cms::model()->findAll();
        $this->render('index', compact('pages'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cms the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cms::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateMenu() {
        $model = new CmsMenu();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsMenu'])) {
            $model->attributes = $_POST['CmsMenu'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page created successfully.');
                $this->redirect(array('menus'));
            }
        }

        $this->render('_menu_form', compact('model'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatemenu($id) {
        $model = $this->loadMenuModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsMenu'])) {
            $model->attributes = $_POST['CmsMenu'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page updated successfully.');
                $this->redirect(array('menus'));
            }
        }

        $this->render('_menu_form', compact('model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletemenu($id) {
        $this->loadMenuModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('menus'));
    }

    /**
     * Lists all models.
     */
    public function actionMenus() {
        $menus = CmsMenu::model()->findAll();
        $this->render('menus', compact('menus'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CmsMenu the loaded model
     * @throws CHttpException
     */
    public function loadMenuModel($id) {
        $model = CmsMenu::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatelink($id) {
        $model = new CmsLink();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsLink'])) {
            $model->attributes = $_POST['CmsLink'];
            $model->menuId = $id;
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page created successfully.');
                $this->redirect(array('links'));
            }
        }

        $this->render('_link_form', compact('model'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdatelink($id) {
        $model = $this->loadLinkModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CmsLink'])) {
            $model->attributes = $_POST['CmsLink'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Page updated successfully.');
                $this->redirect(array('links'));
            }
        }

        $this->render('_link_form', compact('model'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDeletelink($id) {
        $this->loadLinkModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('links'));
    }

    /**
     * Lists all models.
     */
    public function actionLinks($id=NULL) {
        $links = CmsLink::model()->findAll("menuId = '$id'");
        $this->render('links', compact('links','id'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CmsLink the loaded model
     * @throws CHttpException
     */
    public function loadLinkModel($id) {
        $model = CmsLink::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cms-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
}
