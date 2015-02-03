<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banner Layouts'=>array('index'),
	$model->banner_layout_id=>array('view','id'=>$model->banner_layout_id),
	'Update',
);

//$this->menu=array(
//	array('label'=>'List Banner', 'url'=>array('index')),
//	array('label'=>'Create Banner', 'url'=>array('create')),
//	array('label'=>'View Banner', 'url'=>array('view', 'id'=>$model->banner_id)),
//	array('label'=>'Manage Banner', 'url'=>array('admin')),
//);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>