<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<!--<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'contact-form',
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
<?php echo $form->labelEx($model, 'contact_name'); ?>
<?php echo $form->textField($model, 'contact_name', array('size' => 60, 'maxlength' => 256)); ?>
<?php echo $form->error($model, 'contact_name'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'contact_email'); ?>
<?php echo $form->textField($model, 'contact_email', array('size' => 60, 'maxlength' => 256)); ?>
<?php echo $form->error($model, 'contact_email'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'contact_phone'); ?>
<?php echo $form->textField($model, 'contact_phone', array('size' => 15, 'maxlength' => 15)); ?>
<?php echo $form->error($model, 'contact_phone'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'contact_message'); ?>
<?php echo $form->textArea($model, 'contact_message', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'contact_message'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'created'); ?>
<?php echo $form->textField($model, 'created'); ?>
<?php echo $form->error($model, 'created'); ?>
        </div>

        <div class="row">
<?php echo $form->labelEx($model, 'modified'); ?>
<?php echo $form->textField($model, 'modified'); ?>
<?php echo $form->error($model, 'modified'); ?>
        </div>

        <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

<?php $this->endWidget(); ?>

</div> form -->

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">CONTACT US</li>

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
                        'id' => 'contact-form',
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
                        <?php echo $form->labelEx($model, 'contact_name'); ?>
                        <?php echo $form->textField($model, 'contact_name', array('placeholder' => 'Name :', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256)); ?>
                        <?php echo $form->error($model, 'contact_name'); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'contact_email'); ?>
                        <?php echo $form->textField($model, 'contact_email', array('placeholder' => 'Email :', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256)); ?>
                        <?php echo $form->error($model, 'contact_email'); ?>

                    </div>
                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'contact_phone'); ?>
                        <?php echo $form->textField($model, 'contact_phone', array('placeholder' => 'Phone :', 'class' => 'form-control', 'size' => 60, 'maxlength' => 256)); ?>
                        <?php echo $form->error($model, 'contact_phone'); ?>
                    </div>                





                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'contact_message'); ?>
                        <?php echo $form->textArea($model, 'contact_message', array('placeholder' => 'Message :', 'class' => 'form-control', 'maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
                        <?php echo $form->error($model, 'contact_message'); ?>
                    </div>



                    <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'submit btn bg-purple pull-left')); ?>
                    </div>

                </div>
                <div class="panel-body">
                    I Authorise <a href="#"><span style="color:#FF0000;">express2help.com</span></a> to contact me.<br>
                    Email Id - <a href="mailto:info@express2help.com"><span style="color:#FF0000;">info@express2help.com</span></a></div>
                <br>

            </div>                
            <?php $this->endWidget(); ?><br><br>
        </div>
    </div>                 

</div>
</div>
