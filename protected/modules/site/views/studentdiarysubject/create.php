<?php
/* @var $this StudentdiarysubjectController */
/* @var $model StudentDiarySubject */

$this->breadcrumbs=array(
	'Student Diary Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentDiarySubject', 'url'=>array('index')),
	array('label'=>'Manage StudentDiarySubject', 'url'=>array('admin')),
);
?>

<h1>Create StudentDiarySubject</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>