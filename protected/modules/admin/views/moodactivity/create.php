<?php
/* @var $this MoodactivityController */
/* @var $model MoodActivity */

$this->breadcrumbs=array(
	'Mood Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MoodActivity', 'url'=>array('index')),
	array('label'=>'Manage MoodActivity', 'url'=>array('admin')),
);
?>

<h1>Create MoodActivity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>