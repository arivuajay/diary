<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
            <h3 class="page-title">Pages</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('/admin/default/index'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li><a href="#">Pages</a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget box blue">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> <?php echo ($model->isNewRecord) ? "Add Page" : "Update Page"; ?></h4>
                </div>
                <div class="widget-body form">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'cms-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));
                    ?>

                    <p class="note">Fields with <span class="required">*</span> are required.</p>

                    <?php echo $form->errorSummary(array($model)); ?>

                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'heading', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'heading', array('class' => 'span6')); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'slug', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'slug', array('class' => 'span6')); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'body', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'body', array('class' => 'span6')); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'metaTitle', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'metaTitle', array('class' => 'span6')); ?>
                        </div>
                    </div>


                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'metaDescription', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textArea($model, 'metaDescription', array('class' => 'span6')); ?>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <?php echo $form->labelEx($model, 'metaKeywords', array('class' => 'span5 form-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($model, 'metaKeywords', array('class' => 'span6')); ?>
                        </div>
                    </div>

                    <div class="form-actions">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->
</div>
