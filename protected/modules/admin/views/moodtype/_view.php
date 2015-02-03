<?php
/* @var $this MoodTypeController */
/* @var $data MoodType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mood_id), array('view', 'id'=>$data->mood_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_type')); ?>:</b>
	<?php echo CHtml::encode($data->mood_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mood_image')); ?>:</b>
	<?php echo CHtml::encode($data->mood_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>