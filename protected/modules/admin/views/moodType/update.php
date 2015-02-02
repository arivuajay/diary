<?php
/* @var $this MoodTypeController */
/* @var $model MoodType */

$this->breadcrumbs=array(
	'Mood Types'=>array('index'),
	$model->mood_id=>array('view','id'=>$model->mood_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MoodType', 'url'=>array('index')),
	array('label'=>'Create MoodType', 'url'=>array('create')),
	array('label'=>'View MoodType', 'url'=>array('view', 'id'=>$model->mood_id)),
	array('label'=>'Manage MoodType', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>