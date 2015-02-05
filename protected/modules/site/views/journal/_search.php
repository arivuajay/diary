<?php
/* @var $this JournalController */
/* @var $model Diary */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'diary_id'); ?>
		<?php echo $form->textField($model,'diary_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_user_id'); ?>
		<?php echo $form->textField($model,'diary_user_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_title'); ?>
		<?php echo $form->textField($model,'diary_title',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_description'); ?>
		<?php echo $form->textArea($model,'diary_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_category_id'); ?>
		<?php echo $form->textField($model,'diary_category_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_tags'); ?>
		<?php echo $form->textField($model,'diary_tags',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_current_date'); ?>
		<?php echo $form->textField($model,'diary_current_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'diary_user_mood_id'); ?>
		<?php echo $form->textField($model,'diary_user_mood_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->label($model,'diary_upload'); ?>
		<?php // echo $form->textArea($model,'diary_upload',array('rows'=>6, 'cols'=>50)); ?>
	</div>-->

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