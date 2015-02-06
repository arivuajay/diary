<?php
/* @var $this MoodactivityController */
/* @var $model MoodActivity */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mood_activity_id'); ?>
		<?php echo $form->textField($model,'mood_activity_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mood_activity_email'); ?>
		<?php echo $form->textField($model,'mood_activity_email',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mood_activity_mood_id'); ?>
		<?php echo $form->textField($model,'mood_activity_mood_id',array('size'=>20,'maxlength'=>20)); ?>
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