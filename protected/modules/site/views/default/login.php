 <?php
        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        ?>

<body class="minimal login-page">
<script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script> 
<a href="dashboard.html" id="return-arrow"> <i class="fa fa-arrow-circle-left fa-3x text-light"></i> <span class="text-light"> Return <br>
to Website </span> </a> 

<!-- Start: Main -->
<div id="main">
  <div id="content">
    <div class="row">
      <div id="page-logo"> </div>
    </div>
    <div class="row">
      <div class="panel-bg">
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
        <div class="panel">
          <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock text-purple2"></span> Login </span> <span class="panel-header-menu pull-right mr15 text-muted fs12">Express <b>2 Help</b></span> </div>
          <div class="panel-body">
            <div class="login-avatar"> <img src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/login.png" width="150" height="112" alt="avatar"> </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'autocomplete' => 'off', 'autofocus', 'placeholder' => 'User Name')); ?>
                <?php echo $form->error($model, 'username', array('class' => 'error')); ?>
                  <!--<input type="text" class="form-control" placeholder="User Name">-->
              </div>
            </div>
            <div class="form-group">
            <span class="text-mute">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>Lost Password?</a></span>
              <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-link"></span> </span>
                <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Password')); ?>
                <?php echo $form->error($model, 'password', array('class' => 'error')); ?>
                  <!--<input type="text" class="form-control" placeholder="Password">-->
              </div>
            </div>
            <div class="panel-footer"> <span class="text-muted fs12 lh30"><a class="btn btn-sm bg-blue1 pull-left" href="#">Connect with Facebook &nbsp;<i class="fa fa-facebook"></i></a></span> <a class="btn btn-sm bg-blue2 pull-right" href="#">Connect with Twitter &nbsp;<i class="fa fa-twitter"></i> </a>
            <div class="clearfix"></div>
          </div>
          </div>
          <div class="panel-footer"> <span class="text-muted fs12 lh30"><?php echo $form->checkBox($model, 'rememberMe', array('id' => 'check')); ?><?php echo ' Remember Me'; ?> </span>
              <?php echo CHtml::button('Login', array("class" => "btn btn-sm bg-purple2 pull-right fa fa-home", "type" => "submit", 'name' => 'sign_in')); ?>
              <a class="btn btn-sm bg-purple2 pull-right" href="#"><i class="fa fa-home"></i> Login</a>
            <div class="clearfix"></div>
          </div>
        </div>
          <?php $this->endWidget(); ?>
      </div>
      <div class="panel-bg1">© Copyright 2015. All Rights Reserved.</div>
    </div>
  </div>
</div>
<!-- End: Main -->

<div class="overlay-black"></div>
<script type="text/javascript">
jQuery(document).ready(function () {
	  
	 "use strict";

     // Init Theme Core 	  
     Core.init();

     // Enable Ajax Loading 	  
     Ajax.init();
	 
	 // Init Full Page BG(Backstretch) plugin
  	 $.backstretch("<?php echo $themeUrl; ?>/css/frontend/img/stock/splash/6.jpg");



});
</script>
</body>
