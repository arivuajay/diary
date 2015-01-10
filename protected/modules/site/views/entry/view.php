<?php
/* @var $this EntryController */
/* @var $model Entry */

$this->breadcrumbs=array(
	'Entries'=>array('index'),
	$model->temp_id,
);

$this->menu=array(
	array('label'=>'List Entry', 'url'=>array('index')),
	array('label'=>'Create Entry', 'url'=>array('create')),
	array('label'=>'Update Entry', 'url'=>array('update', 'id'=>$model->temp_id)),
	array('label'=>'Delete Entry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->temp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entry', 'url'=>array('admin')),
);
?>

<h1>View Entry #<?php echo $model->temp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'temp_id',
		'temp_activation_key',
		'temp_title',
		'temp_description',
		'temp_category_id',
		'temp_tags',
		'temp_current_date',
		'temp_user_mood_id',
		'temp_upload',
		'created',
		'modified',
	),
)); ?>
