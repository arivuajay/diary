<?php
$flashMessages = Yii::app()->user->getFlashes();
if (!empty($flashMessages)):
    echo '<div class="col-lg-5 col-md-5  col-sm-5 center-block fn clearfix mt20 alert-notify">';
    foreach ($flashMessages as $key => $message) {
        echo "<div class='alert alert-$key'>$message <a href='javascript:void(0)' class='close alert-close' aria-hidden='true'>&times;</a></div>";
    }
    echo '</div>';
endif;
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'loginform',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('class' => 'form-signin')
        ));
if (isset(Yii::app()->request->cookies['admin_username']->value)) {
    $model->username = Yii::app()->request->cookies['admin_username']->value;
    $model->rememberMe = 1;
}
?> 
<h2 class="form-signin-heading">sign in now</h2>
<?php echo $form->errorSummary($model, ''); ?>
<div class="login-wrap">
    <div class="user-login-info">
        <?php echo $form->textField($model, 'username', array('autofocus', 'class' => 'form-control', 'placeholder' => $model->getAttributeLabel('username'))); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('password'))); ?>
    </div>
    <label class="checkbox">
        <?php echo $form->checkBox($model, 'rememberMe') . ' ' . $model->getAttributeLabel('rememberMe'); ?>
        <span class="pull-right">
            <a href="<?php echo $this->createUrl('/admin/default/forgotpassword'); ?>"> Forgot Password?</a>
        </span>
    </label>
    <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
</div>

<?php $this->endWidget(); ?>