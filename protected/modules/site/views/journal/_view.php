<?php
/* @var $this JournalController */
/* @var $data Diary */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->diary_id), array('view', 'id'=>$data->diary_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->diary_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_title')); ?>:</b>
	<?php echo CHtml::encode($data->diary_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_description')); ?>:</b>
	<?php echo CHtml::encode($data->diary_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->diary_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_tags')); ?>:</b>
	<?php echo CHtml::encode($data->diary_tags); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_current_date')); ?>:</b>
	<?php echo CHtml::encode($data->diary_current_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_user_mood_id')); ?>:</b>
	<?php echo CHtml::encode($data->diary_user_mood_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diary_upload')); ?>:</b>
	<?php echo CHtml::encode($data->diary_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>

</div>