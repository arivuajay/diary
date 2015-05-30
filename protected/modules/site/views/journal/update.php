<?php
/* @var $this JournalController */
/* @var $model Diary */

$this->breadcrumbs=array(
	'Diaries'=>array('index'),
	$model->diary_id=>array('view','id'=>$model->diary_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Diary', 'url'=>array('index')),
	array('label'=>'Create Diary', 'url'=>array('create')),
	array('label'=>'View Diary', 'url'=>array('view', 'id'=>$model->diary_id)),
	array('label'=>'Manage Diary', 'url'=>array('admin')),
);
?>

<?php
if (@$_COOKIE['diary_mode'] == '2'):
    $this->renderPartial('_student_form', array('model' => $model));
else:
    $this->renderPartial('_form', array('model'=>$model));
endif;
