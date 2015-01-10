<?php
$flashMessages = Yii::app()->user->getFlashes();
if (!empty($flashMessages)):
    echo '<div class="col-lg-5 col-md-5  col-sm-5 center-block fn clearfix mt20 alert-notify">';
    foreach ($flashMessages as $key => $message) {
        echo "<div class='alert alert-$key'>$message <a href='javascript:void(0)' class='close alert-close' aria-hidden='true'>&times;</a></div>";
    }
    echo '</div>';
endif;
echo Myclass::encrypt('admin');
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
            <a data-toggle="modal" href="#myModal-removed"> Forgot Password?</a>
        </span>
    </label>
    <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<?php $this->endWidget(); ?>