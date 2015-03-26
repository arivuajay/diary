<?php
/* @var $this TodolistController */
/* @var $model Todolist */

$this->breadcrumbs=array(
	'Todolists'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Todolist', 'url'=>array('index')),
	array('label'=>'Create Todolist', 'url'=>array('create')),
	array('label'=>'View Todolist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Todolist', 'url'=>array('admin')),
);
?>

<h1>Update Todolist <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>