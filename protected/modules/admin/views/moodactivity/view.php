<?php
/* @var $this MoodactivityController */
/* @var $model MoodActivity */

$this->breadcrumbs=array(
	'Mood Activities'=>array('index'),
	$model->mood_activity_id,
);

$this->menu=array(
	array('label'=>'List MoodActivity', 'url'=>array('index')),
	array('label'=>'Create MoodActivity', 'url'=>array('create')),
	array('label'=>'Update MoodActivity', 'url'=>array('update', 'id'=>$model->mood_activity_id)),
	array('label'=>'Delete MoodActivity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mood_activity_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MoodActivity', 'url'=>array('admin')),
);
?>

<h1>View MoodActivity #<?php echo $model->mood_activity_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mood_activity_id',
		'mood_activity_email',
		'mood_activity_mood_id',
		'created',
		'modified',
	),
)); ?>
