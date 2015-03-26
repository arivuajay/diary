<?php
/* @var $this TodolistController */
/* @var $model Todolist */

$this->breadcrumbs=array(
	'Todolists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Todolist', 'url'=>array('index')),
	array('label'=>'Create Todolist', 'url'=>array('create')),
	array('label'=>'Update Todolist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Todolist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Todolist', 'url'=>array('admin')),
);
?>

<h1>View Todolist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'reminder_time',
		'status',
		'user_id',
	),
)); ?>
