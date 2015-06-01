<?php
/* @var $this StudentdiarysubjectController */
/* @var $model StudentDiarySubject */

$this->breadcrumbs=array(
	'Student Diary Subjects'=>array('index'),
	$model->subject_id,
);

$this->menu=array(
	array('label'=>'List StudentDiarySubject', 'url'=>array('index')),
	array('label'=>'Create StudentDiarySubject', 'url'=>array('create')),
	array('label'=>'Update StudentDiarySubject', 'url'=>array('update', 'id'=>$model->subject_id)),
	array('label'=>'Delete StudentDiarySubject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->subject_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentDiarySubject', 'url'=>array('admin')),
);
?>

<h1>View StudentDiarySubject #<?php echo $model->subject_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'subject_id',
		'user_id',
		'class_id',
		'subject_name',
		'created',
		'modified',
	),
)); ?>
