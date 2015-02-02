<?php
/* @var $this MoodTypeController */
/* @var $model MoodType */

$this->breadcrumbs=array(
	'Mood Types'=>array('index'),
	$model->mood_id,
);

$this->menu=array(
	array('label'=>'List MoodType', 'url'=>array('index')),
	array('label'=>'Create MoodType', 'url'=>array('create')),
	array('label'=>'Update MoodType', 'url'=>array('update', 'id'=>$model->mood_id)),
	array('label'=>'Delete MoodType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mood_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MoodType', 'url'=>array('admin')),
);
?>

<h1>View MoodType #<?php echo $model->mood_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mood_id',
		'mood_type',
		'mood_image',
		'created',
		'modified',
	),
)); ?>
