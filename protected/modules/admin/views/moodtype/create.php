<?php
/* @var $this MoodTypeController */
/* @var $model MoodType */

$this->breadcrumbs=array(
	'Mood Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MoodType', 'url'=>array('index')),
	array('label'=>'Manage MoodType', 'url'=>array('admin')),
);
?>

<!--<h1>Create MoodType</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>