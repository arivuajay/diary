<?php
/* @var $this StudentdiaryclassController */
/* @var $model StudentDiaryClass */

$this->breadcrumbs=array(
	'Student Diary Classes'=>array('index'),
	$model->class_id=>array('view','id'=>$model->class_id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List StudentDiaryClass', 'url'=>array('index')),
//	array('label'=>'Create StudentDiaryClass', 'url'=>array('create')),
//	array('label'=>'View StudentDiaryClass', 'url'=>array('view', 'id'=>$model->class_id)),
//	array('label'=>'Manage StudentDiaryClass', 'url'=>array('admin')),
//);
?>

<!--<h1>Update StudentDiaryClass <?php echo $model->class_id; ?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>