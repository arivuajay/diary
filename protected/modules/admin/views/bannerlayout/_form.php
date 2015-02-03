<?php
/* @var $this BannerLayoutController */
/* @var $model BannerLayout */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><?php echo ($model->isNewRecord) ? "Add Banner Layout" : "Update Banner Layout"; ?></header>
            <div class="panel-body">
                <div class="position-left">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'banner-layout-form',
                        'enableAjaxValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array('class' => 'form-horizontal', 'role' => 'form'),
                    ));
                    ?>
                    <?php echo $form->errorSummary(array($model)); ?>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner_layout_name', array('class' => 'col-lg-3 col-sm-2 control-label')); ?>
                        <div class="col-lg-3">
                            <?php echo $form->textField($model, 'banner_layout_name', array('class' => 'form-control')); ?>
                            <?php // echo $form->error($model, 'banner_layout_page'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner_layout_page', array('class' => 'col-lg-3 col-sm-2 control-label')); ?>
                        <div class="col-lg-3">
                            <?php echo $form->dropDownList($model, 'banner_layout_page', Myclass::getPageLayouts(), array('type' => 'text', 'empty' => '--Select Page--', 'class' => 'form-control ')); ?>
                            <?php // echo $form->error($model, 'banner_layout_page'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner_layout_position', array('class' => 'col-lg-3 col-sm-2 control-label')); ?>
                        <div class="col-lg-3">
                            <?php echo $form->dropDownList($model, 'banner_layout_position', Myclass::getPageLayoutPositions(), array('type' => 'text', 'empty' => '--Select Page--', 'class' => 'form-control ')); ?>
                                 <?php //echo $form->error($model, 'banner_layout_position'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'banner_layout_dimensions', array('class' => 'col-lg-3 col-sm-2 control-label')); ?>
                        <div class="col-lg-9">
                            <?php echo $form->textField($model, 'banner_layout_dimensions', array('class' => 'form-control')); ?>
                            <?php //echo $form->error($model, 'banner_layout_dimensions'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-9">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- form -->