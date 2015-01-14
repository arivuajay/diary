<head>
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<title>Express 2 Help</title>
<meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
<meta name="description" content="Fusion - A Responsive HTML5 Admin UI Template Theme">
<meta name="author" content="AdminDesigns">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font CSS (Via CDN) -->
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>

  <?php
        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs_pos_end = CClientScript::POS_END;

        $cs->registerCssFile($themeUrl . '/css/frontend/vendor/bootstrap/css/bootstrap.min.css');
        $cs->registerCssFile($themeUrl . '/css/frontend/css/vendor.css');
        $cs->registerCssFile($themeUrl . '/css/frontend/css/theme.css');
        $cs->registerCssFile($themeUrl . '/css/frontend/css/utility.css');
        $cs->registerCssFile($themeUrl . '/css/frontend/css/custom.css');
      
                     
        ?>

<?php 
//       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/jquery/jquery-1.11.1.min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/jquery/jquery_ui/jquery-ui.min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/bootstrap/js/bootstrap.min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/backstretch/jquery.backstretch.min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/js/utility/spin.min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/js/utility/underscore-min.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/js/main.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/js/ajax.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/js/custom.js');
       
       
       //$cs->registerScriptFile($themeUrl . '/css/frontend/vendor/editors/ckeditor/ckeditor.js',$cs_pos_end);
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/editors/summernote/summernote.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/editors/markitup/jquery.markitup.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/editors/markitup/sets/default/set.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/globalize/globalize.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/validate/jquery.validate.js');
       //$cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/multiselect/bootstrap-multiselect.js');
       //$cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/daterange/moment.min.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/daterange/daterangepicker.js');
       $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/colorpicker/bootstrap-colorpicker.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/timepicker/bootstrap-timepicker.min.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/datepicker/bootstrap-datepicker.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/jquerymask/jquery.maskedinput.min.js');
      // $cs->registerScriptFile($themeUrl . '/css/frontend/vendor/plugins/tags/tagmanager.js');
       
?>




<!-- Theme CSS -->
<!--<link rel="stylesheet" type="text/css" href="css/vendor.css">
<link rel="stylesheet" type="text/css" href="css/theme.css">
<link rel="stylesheet" type="text/css" href="css/utility.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">-->

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $themeUrl; ?>/css/frontend/img/favicon.ico">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<?php echo $content; ?>