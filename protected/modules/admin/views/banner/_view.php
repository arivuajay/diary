<?php
/* @var $this BannerController */
/* @var $data Banner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->banner_id), array('view', 'id'=>$data->banner_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner_image')); ?>:</b>
	<?php echo CHtml::encode($data->banner_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner_layout_id')); ?>:</b>
	<?php echo CHtml::encode($data->banner_layout_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('banner_status')); ?>:</b>
	<?php echo CHtml::encode($data->banner_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>