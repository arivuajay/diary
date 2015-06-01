<?php
/* @var $this StudentdiarysubjectController */
/* @var $data StudentDiarySubject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subject_id), array('view', 'id'=>$data->subject_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_name')); ?>:</b>
	<?php echo CHtml::encode($data->subject_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>