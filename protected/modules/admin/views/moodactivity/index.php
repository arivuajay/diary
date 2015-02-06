<?php
/* @var $this MoodactivityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mood Activities',
);

$this->menu=array(
	array('label'=>'Create MoodActivity', 'url'=>array('create')),
	array('label'=>'Manage MoodActivity', 'url'=>array('admin')),
);
?>

<h1>Mood Activities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
