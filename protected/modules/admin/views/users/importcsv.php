<?php
/* @var $this FaqController */
/* @var $model Faq */
/* @var $form CActiveForm */
$this->breadcrumbs = array(
    'Users' => array('index'),
    "Import Users",
);
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Import Users
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'service-form',
                        'enableAjaxValidation' => false,
                        'method' => 'post',
                        'htmlOptions' => array(
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-inline'
                        )
                    ));
                    ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'file'); ?>
                        <?php echo $form->fileField($model, 'file'); ?>
                        <?php echo $form->error($model, 'file'); ?><br>
                        NOTE: Upload CSV files only, File Size Should be below 50MB.
                    </div>
                    <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </section>
    </div>
</div>