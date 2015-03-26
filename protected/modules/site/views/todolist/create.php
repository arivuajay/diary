<?php
/* @var $this TodolistController */
/* @var $model Todolist */

$this->breadcrumbs=array(
	'Todolists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Todolist', 'url'=>array('index')),
	array('label'=>'Manage Todolist', 'url'=>array('admin')),
);
?>

<h1>Create Todolist</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>