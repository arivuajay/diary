<?php
/* @var $this TodolistController */
/* @var $model Todolist */
/* @var $form CActiveForm */
?>
<!--
<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'todolist-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

        <div class="row">
<?php echo $form->labelEx($model, 'message'); ?>
<?php echo $form->textField($model, 'message', array('size' => 60, 'maxlength' => 128)); ?>
<?php echo $form->error($model, 'message'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'reminder_time'); ?>
<?php echo $form->textField($model, 'reminder_time'); ?>
<?php echo $form->error($model, 'reminder_time'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'status'); ?>
<?php echo $form->textField($model, 'status', array('size' => 1, 'maxlength' => 1)); ?>
<?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'user_id'); ?>
<?php echo $form->textField($model, 'user_id', array('size' => 20, 'maxlength' => 20)); ?>
<?php echo $form->error($model, 'user_id'); ?>
        </div>

        <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

<?php $this->endWidget(); ?>

</div>-->

<!-- form -->




<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Todolist</li>

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
                        'id' => 'todolist-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <!--<div class="form-group">
                      <label for="name">Your Name</label>
                      <input id="name" name="name" type="text" class="form-control" placeholder="Rajat Grover" required />
                    </div>-->
                    <?php echo $form->errorSummary($model); ?>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'message'); ?>
                        <?php
                        echo $form->textField($model, 'message', array('placeholder' => 'Message ', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256,
                        ));
                        ?>
                        <?php echo $form->error($model, 'message'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'reminder_time'); ?>
                        <?php
                        // echo $form->textField($model, 'reminder_time', array('placeholder' => 'Email ', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256,));
                        ?>
                        <?php echo $form->error($model, 'reminder_time'); ?>
                        <?php
                        $this->widget('ext.YiiDateTimePicker.jqueryDateTime', array(
                            'model' => $model,
                            'attribute' => 'reminder_time',
                            'options' => array(), //DateTimePicker options
                            'htmlOptions' => array('placeholder' => 'Date & Time ','class' => 'form-control'),
                        ));
                        ?>

                    </div>


                    <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'submit btn bg-purple pull-left')); ?>
                    </div>

                </div>
                <div class="panel-body">

                </div>

                <br>

            </div>                
            <?php $this->endWidget(); ?><br><br>
        </div>
    </div>                 

</div>
</div>