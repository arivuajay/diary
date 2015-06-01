<?php
/* @var $this StudentdiarysubjectController */
/* @var $model StudentDiarySubject */

$this->breadcrumbs=array(
	'Student Diary Subjects'=>array('index'),
	$model->subject_id=>array('view','id'=>$model->subject_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentDiarySubject', 'url'=>array('index')),
	array('label'=>'Create StudentDiarySubject', 'url'=>array('create')),
	array('label'=>'View StudentDiarySubject', 'url'=>array('view', 'id'=>$model->subject_id)),
	array('label'=>'Manage StudentDiarySubject', 'url'=>array('admin')),
);
?>

<h1>Update StudentDiarySubject <?php echo $model->subject_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>