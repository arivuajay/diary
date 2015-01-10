<?php
/* @var $this EntryController */
/* @var $data Entry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->temp_id), array('view', 'id'=>$data->temp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_activation_key')); ?>:</b>
	<?php echo CHtml::encode($data->temp_activation_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_title')); ?>:</b>
	<?php echo CHtml::encode($data->temp_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_description')); ?>:</b>
	<?php echo CHtml::encode($data->temp_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->temp_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_tags')); ?>:</b>
	<?php echo CHtml::encode($data->temp_tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_current_date')); ?>:</b>
	<?php echo CHtml::encode($data->temp_current_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_user_mood_id')); ?>:</b>
	<?php echo CHtml::encode($data->temp_user_mood_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temp_upload')); ?>:</b>
	<?php echo CHtml::encode($data->temp_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>