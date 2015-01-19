<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Express 2 Help</title>
        <meta name="description" content="The Spice Lounge" />
        <meta name="keywords" content="The Spice Lounge" />
        <meta name="author" content="The Spice Lounge" />

        <!-- Loading Google Web fonts-->
        <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

        <?php
        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($themeUrl . '/css/home/assets/css/bootstrap.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/bootstrap-datetimepicker.min.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/animate.min.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/style.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/menu.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/slicknav.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/component.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/cycleslider.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.shutter.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/portfolio_new.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/prettyPhoto.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/colors/color1.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');
        $cs->registerCssFile($themeUrl . '/css/home/assets/css/supersized.css');


        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-1.11.1.min.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-migrate-1.2.1.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-ui.min.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/modernizr.custom.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-1.11.1.min.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-1.11.1.min.js');
        ?>

        <!--
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
        
        Menu
        <link rel="stylesheet" href="assets/css/menu.css" type="text/css" />
        SlickNavigation For Mobile Device
        <link rel="stylesheet" href="assets/css/slicknav.css">
        SlickNavigation For Mobile Device End
        Menu End
        
        Home Tiled Slider
        <link rel="stylesheet" href="assets/css/component.css" type="text/css" />
        Home Tiled Slider End
        
         Vegas Slider
        <link rel="stylesheet" href="assets/css/vegas_styles.css" />
         Vegas Slider End
        
        Gallery
        
        Gallery Cycle Slider
        <link rel="stylesheet" href="assets/css/cycleslider.css">
        Gallery Cycle Slider End
        
        Gallery SuperSized Slider
        <link rel="stylesheet" href="assets/css/supersized.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="assets/css/supersized.shutter.css" type="text/css" media="screen" />
        Gallery SuperSized Slider End
        
        Gallery Filer
        <link type="text/css" rel="stylesheet" href="assets/css/portfolio_new.css"/>
        <link rel="stylesheet" href="assets/css/prettyPhoto.css" type="text/css" />
        Gallery Filer End
        
        Color Change
        <link rel="stylesheet" href="assets/css/colors/color1.css" id="color" type="text/css" />
        Color Change End-->



        <link rel="shortcut icon" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/favicon.ico" /> 
        <link rel="apple-touch-icon" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon_72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon_114x114.png" />

        <script src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery-migrate-1.2.1.js"></script>
        <script src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/modernizr.custom.js"></script>


    </head>
    <body>
        <!--PRELOADER-->
        <section id="jSplash">
            <div id="circle"></div>
        </section>
        <div id="menutop"></div>	


        <!--Wrapper 
        =============================-->
        <div id="wrapper">
            
            <?php echo $content; ?>
            
        </div>
        <!-- // Wrapper =============================-->




        <!--java script-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/bootstrap.min.js"></script>
        <!-- Form Validation-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.validate.min.js"></script>
        <!-- Form Validation End-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.fitvids.js"></script>
<!--        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->


        <!-- SlickNavigation For Mobile Device-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.slicknav.min.js"></script>
        <!-- SlickNavigation For Mobile Device Ends-->

        <!-- Content NiceScroll -->
        <script src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.easing.1.3.js"></script>
        <!-- Content NiceScroll End-->

        <!-- include retina js -->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/retina-1.1.0.min.js"></script>
        <!-- include retina js Ends-->

        <!-- Optional Scripts Starts -->

        <!-- Preloader Starts -->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jpreloader.min.js"></script>
        <!-- Preloader End -->

        <!-- Cycle Slider Gallery Starts-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.cycle.all.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.cycle2.caption2.js"></script>
        <!-- Cycle Slider Gallery End-->

        <!--SuperSized Gallery-->
<!--        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/supersized.3.2.7.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/supersized.shutter.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/supersized_custom.js"></script>-->
        <!--SuperSized Gallery End-->

        <!-- Filter Gallery And PrettyPhoto-->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/jquery.mixitup.min.js"></script>
        <!-- Filter Gallery And PrettyPhoto End-->


        <!-- Home Tiled Sldier -->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/classie.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/boxesFx.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/wait.js"></script>
        <!-- Home Tiled Sldier End-->


        <!-- Home Cycle Slider Sldier -->
        <!--<script type="text/javascript" src="assets/js/jquery_cycle_custom.js"></script>-->
        <!-- Home Cycle Slider Sldier -->


        <!-- Vegas sliders -->
        <!--<script src="assets/js/jquery.vegas.js"></script>-->
        <!-- Vegas sliders End-->

        <!-- YT Player -->
        <!--  <script src="assets/js/jquery.mb.YTPlayer.js"></script>
          <script src="assets/js/video_custom.js"></script>-->
        <!-- YTPlayer End -->

        <!-- Optional Scripts Ends -->

        <!-- Custom Scripts -->
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/custom_general_box.js"></script>
        <script type="text/javascript" src="<?php echo $themeUrl; ?>/css/home/assets/js/custom_general.js"></script>
        <!-- Custom Scripts End-->

    </body>

</html>