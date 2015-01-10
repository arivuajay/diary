<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'loginForm',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-signin cmxform', 'role' => 'form')
        ));

if (isset(Yii::app()->request->cookies['altimus_app_username']->value)) {
    $model->username = Yii::app()->request->cookies['altimus_app_username']->value;
    $model->rememberMe = 1;
}
?>    
<h2 class="form-signin-heading"><?php echo Myclass::t('APP1'); ?></h2>
<div class="login-wrap">
    <div class="form-group">
        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'autocomplete' => 'off', 'autofocus', 'placeholder' => Myclass::t('APP2'))); ?>
        <?php echo $form->error($model, 'username', array('class' => 'error')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => $model->getAttributeLabel('password'))); ?>
        <?php echo $form->error($model, 'password', array('class' => 'error')); ?>
    </div>

    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check')); ?><?php echo Myclass::t('APP4'); ?>
        <span class="pull-right">
            <a data-toggle="modal" href="#myModal"><?php echo Myclass::t('APP5'); ?></a>
        </span>
    </label>
    <?php echo CHtml::button(Myclass::t('APP8'), array("class" => "btn btn-lg btn-login btn-block", "type" => "submit", 'name' => 'sign_in')); ?>

    <div class="registration">
        <?php echo Myclass::t('APP6'); ?>
        <?php echo CHtml::link(Myclass::t('APP7'), '#'); ?>
    </div>
</div>
<?php $this->endWidget(); ?>