<?php
/* @var $this MoodTypeController */
/* @var $model MoodType */
/* @var $form CActiveForm */
$this->breadcrumbs = array(
    'Mood Type' => array('index'),
    ($model->isNewRecord) ? "Add Mood Type" : "Update Mood Type",
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><?php echo ($model->isNewRecord) ? "Add Mood Type" : "Update Mood Type"; ?></header>
            <div class="panel-body">
                <div class="position-center">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'mood-type-form',
                        'enableAjaxValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form'),
                    ));
                    ?>
                    <?php echo $form->errorSummary(array($model)); ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'mood_type', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->textField($model, 'mood_type', array('class' => 'form-control')); ?>
                                 <?php //echo $form->error($model, 'mood_type'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'mood_image', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->fileField($model, 'mood_image'); ?>
                            <?php //echo $form->error($model, 'mood_image'); ?>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </section>
    </div>
</div>
