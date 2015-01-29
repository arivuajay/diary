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
        $cs_pos_end = CClientScript::POS_END;

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

//        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-1.11.1.min.js');
//        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-migrate-1.2.1.js');
//        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery-ui.min.js');
        $cs->registerScriptFile($themeUrl . '/css/home/assets/js/modernizr.custom.js');
        ?>

        <link rel="shortcut icon" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/favicon.ico" />
        <link rel="apple-touch-icon" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon_72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themeUrl; ?>/css/home/assets/assets/images/apple_touch_icon_114x114.png" />
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
            <div id="mask">
                
                <?php echo $content; ?>

            </div>
        </div>
        <!-- // Wrapper =============================-->




        <!--java script-->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/bootstrap.min.js', $cs_pos_end); ?>
        <!-- Form Validation-->
        
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.validate.min.js', $cs_pos_end); ?>
        
        <!-- Form Validation End-->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/bootstrap-datetimepicker.min.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.scrollTo.min.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.fitvids.js', $cs_pos_end); ?>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->


        <!-- SlickNavigation For Mobile Device-->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.slicknav.min.js', $cs_pos_end); ?>
        <!-- SlickNavigation For Mobile Device Ends-->

        <!-- Content NiceScroll -->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.nicescroll.min.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.mousewheel.min.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.easing.1.3.js', $cs_pos_end); ?>
        <!-- Content NiceScroll End-->

        <!-- include retina js -->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/retina-1.1.0.min.js', $cs_pos_end); ?>
        <!-- include retina js Ends-->

        <!-- Optional Scripts Starts -->

        <!-- Preloader Starts -->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jpreloader.min.js', $cs_pos_end); ?>
        <!-- Preloader End -->

        <!-- Cycle Slider Gallery Starts-->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.cycle.all.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.cycle2.caption2.js', $cs_pos_end); ?>
        <!-- Cycle Slider Gallery End-->

        <!--SuperSized Gallery-->
        <?php // $cs->registerScriptFile($themeUrl . '/css/home/assets/js/supersized.3.2.7.min.js', $cs_pos_end); ?>
        <?php // $cs->registerScriptFile($themeUrl . '/css/home/assets/js/supersized.shutter.min.js', $cs_pos_end); ?>
        <?php // $cs->registerScriptFile($themeUrl . '/css/home/assets/js/supersized_custom.js', $cs_pos_end); ?>
        <!--SuperSized Gallery End-->

        <!-- Filter Gallery And PrettyPhoto-->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.prettyPhoto.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/jquery.mixitup.min.js', $cs_pos_end); ?>
        <!-- Filter Gallery And PrettyPhoto End-->


        <!-- Home Tiled Sldier -->
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/classie.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/boxesFx.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/wait.js', $cs_pos_end); ?>
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
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/custom_general_box.js', $cs_pos_end); ?>
        <?php $cs->registerScriptFile($themeUrl . '/css/home/assets/js/custom_general.js', $cs_pos_end); ?>
        <!-- Custom Scripts End-->

    </body>

</html>