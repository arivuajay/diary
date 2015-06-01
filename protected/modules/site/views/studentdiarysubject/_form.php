<?php
/* @var $this StudentdiarysubjectController */
/* @var $model StudentDiarySubject */
/* @var $form CActiveForm */
?>
<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active"><?php echo $model->isNewRecord ? 'Add' : 'Edit ' . ' Subject' ?></li>

        </ol>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-6l">
            <div class="panel">
              <!--<div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Write An Entry </span> </div>-->
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'student-diary-subject-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => true,
                        'htmlOptions' => array(''),
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                    ));
                    ?>

                    <!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

                    <?php // echo $form->errorSummary($model); ?>


                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'class_id'); ?>
                        <?php echo $form->dropDownList($model, 'class_id', Myclass::getUserClasses(Yii::app()->user->id), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'class_id'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'subject_name'); ?>
                        <?php echo $form->textField($model, 'subject_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 250)); ?>
                        <?php echo $form->error($model, 'subject_name'); ?>
                    </div>


                    <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'submit btn bg-purple pull-left')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>