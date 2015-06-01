<?php
/* @var $this StudentdiaryclassController */
/* @var $model StudentDiaryClass */

$this->breadcrumbs=array(
	'Student Diary Classes'=>array('index'),
	$model->class_id,
);

$this->menu=array(
	array('label'=>'List StudentDiaryClass', 'url'=>array('index')),
	array('label'=>'Create StudentDiaryClass', 'url'=>array('create')),
	array('label'=>'Update StudentDiaryClass', 'url'=>array('update', 'id'=>$model->class_id)),
	array('label'=>'Delete StudentDiaryClass', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->class_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentDiaryClass', 'url'=>array('admin')),
);
?>

<h1>View StudentDiaryClass #<?php echo $model->class_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class_id',
		'user_id',
		'class_name',
		'created',
		'modified',
	),
)); ?>
