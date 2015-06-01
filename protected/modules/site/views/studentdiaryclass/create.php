<?php
/* @var $this StudentdiaryclassController */
/* @var $model StudentDiaryClass */

$this->breadcrumbs=array(
	'Student Diary Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentDiaryClass', 'url'=>array('index')),
	array('label'=>'Manage StudentDiaryClass', 'url'=>array('admin')),
);
?>

<h1>Create Student Diary Class</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>