<?php
/* @var $this FeedbackController */
/* @var $data Feedback */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->feedback_id), array('view', 'id'=>$data->feedback_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_name')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_email')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_phone')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_message')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>