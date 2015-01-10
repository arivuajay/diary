<?php
/* @var $this EntryController */
/* @var $model Entry */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'temp_id'); ?>
		<?php echo $form->textField($model,'temp_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_activation_key'); ?>
		<?php echo $form->textField($model,'temp_activation_key',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_title'); ?>
		<?php echo $form->textField($model,'temp_title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_description'); ?>
		<?php echo $form->textArea($model,'temp_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_category_id'); ?>
		<?php echo $form->textField($model,'temp_category_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_tags'); ?>
		<?php echo $form->textField($model,'temp_tags',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_current_date'); ?>
		<?php echo $form->textField($model,'temp_current_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_user_mood_id'); ?>
		<?php echo $form->textField($model,'temp_user_mood_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temp_upload'); ?>
		<?php echo $form->textArea($model,'temp_upload',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->