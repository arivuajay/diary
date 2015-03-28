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


<?php $this->renderPartial('_form', array('model'=>$model)); ?>