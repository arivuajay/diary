<?php
/* @var $this NotificationController */
/* @var $model Notification */
/* @var $form CActiveForm */
?>




<?php 


$this->breadcrumbs = array(
    'Notification' => array('index'),
    ($model->isNewRecord) ? "Add Notificatione" : "Update Notificatione",
);
?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading"><?php echo ($model->isNewRecord) ? "Add Notificatione" : "Update Notificatione"; ?></header>
            <div class="panel-body">
                <div class="position-center">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'notification-form',
                        'enableAjaxValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'role' => 'form'),
                    ));
                    ?>
                    <?php echo $form->errorSummary(array($model)); ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'notification_title', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->textField($model, 'notification_title', array('class' => 'form-control')); ?>
                                 <?php //echo $form->error($model, 'mood_type'); ?>
                        </div>
                    </div>
                     <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'notification_message', array('class' => 'col-lg-2 col-sm-2 control-label')); ?>
                        <div class="col-lg-10">
                            <?php echo $form->textArea($model, 'notification_message', array('class' => 'form-control','id'=>'editor1')); ?>
                        </div>
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
<script type="text/javascript">
    CKEDITOR.replace( 'editor1', {
        enterMode : Number(2),
         filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
         filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
         filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
         filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
         filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
         filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
    });
</script>