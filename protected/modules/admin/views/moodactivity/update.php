<?php
/* @var $this MoodactivityController */
/* @var $model MoodActivity */

$this->breadcrumbs=array(
	'Mood Activities'=>array('index'),
	$model->mood_activity_id=>array('view','id'=>$model->mood_activity_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MoodActivity', 'url'=>array('index')),
	array('label'=>'Create MoodActivity', 'url'=>array('create')),
	array('label'=>'View MoodActivity', 'url'=>array('view', 'id'=>$model->mood_activity_id)),
	array('label'=>'Manage MoodActivity', 'url'=>array('admin')),
);
?>

<h1>Update MoodActivity <?php echo $model->mood_activity_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>