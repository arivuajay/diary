<?php
/* @var $this EntryController */
/* @var $model Entry */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entry-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_activation_key'); ?>
		<?php echo $form->textField($model,'temp_activation_key',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_activation_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_title'); ?>
		<?php echo $form->textField($model,'temp_title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_description'); ?>
		<?php echo $form->textArea($model,'temp_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'temp_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_category_id'); ?>
		<?php echo $form->textField($model,'temp_category_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'temp_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_tags'); ?>
		<?php echo $form->textField($model,'temp_tags',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'temp_tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_current_date'); ?>
		<?php echo $form->textField($model,'temp_current_date'); ?>
		<?php echo $form->error($model,'temp_current_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_user_mood_id'); ?>
		<?php echo $form->textField($model,'temp_user_mood_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'temp_user_mood_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp_upload'); ?>
		<?php echo $form->textArea($model,'temp_upload',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'temp_upload'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->