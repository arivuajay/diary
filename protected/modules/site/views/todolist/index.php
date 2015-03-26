<?php
/* @var $this TodolistController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Todolists',
);

$this->menu=array(
	array('label'=>'Create Todolist', 'url'=>array('create')),
	array('label'=>'Manage Todolist', 'url'=>array('admin')),
);
?>

<h1>Todolists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
