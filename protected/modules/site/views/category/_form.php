<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active"><?php echo $model->isNewRecord ? 'Add' : 'Edit '. ' Category'?></li>

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
                        'id' => 'category-form',
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

                    <?php // echo $form->errorSummary($model); ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model,'category_name'); ?>
                        <?php echo $form->textField($model, 'category_name', array('placeholder' => 'Name :', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256)); ?>
                        <?php echo $form->error($model, 'category_name'); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'submit btn bg-purple pull-left')); ?>
                    </div>

                </div>

            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
</div>
