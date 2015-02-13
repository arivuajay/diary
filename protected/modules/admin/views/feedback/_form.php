<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feedback-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_name'); ?>
		<?php echo $form->textField($model,'feedback_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'feedback_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_email'); ?>
		<?php echo $form->textField($model,'feedback_email',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'feedback_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_phone'); ?>
		<?php echo $form->textField($model,'feedback_phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'feedback_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feedback_message'); ?>
		<?php echo $form->textArea($model,'feedback_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'feedback_message'); ?>
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