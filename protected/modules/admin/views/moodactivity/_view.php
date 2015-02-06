<?php
/* @var $this MoodactivityController */
/* @var $data MoodActivity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_activity_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mood_activity_id), array('view', 'id'=>$data->mood_activity_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_activity_email')); ?>:</b>
	<?php echo CHtml::encode($data->mood_activity_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_activity_mood_id')); ?>:</b>
	<?php echo CHtml::encode($data->mood_activity_mood_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>