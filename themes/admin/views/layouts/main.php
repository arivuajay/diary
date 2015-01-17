<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?php echo Yii::app()->name . " - Admin Panel"; ?></title>
        <?php
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($themeUrl . '/bs3/css/bootstrap.min.css');
        $cs->registerCssFile($themeUrl . '/js/jquery-ui/jquery-ui-1.10.1.custom.min.css');
        $cs->registerCssFile($themeUrl . '/css/bootstrap-reset.css');
        $cs->registerCssFile($themeUrl . '/font-awesome/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/js/jvector-map/jquery-jvectormap-1.2.2.css');
        $cs->registerCssFile($themeUrl . '/css/clndr.css');
        $cs->registerCssFile($themeUrl . '/js/css3clock/css/style.css');
        $cs->registerCssFile($themeUrl . '/js/morris-chart/morris.css');
        $cs->registerCssFile($themeUrl . '/css/style.css');
        $cs->registerCssFile($themeUrl . '/css/style-responsive.css');
        $cs->registerCssFile($themeUrl . '/js/advanced-datatable/css/demo_page.css');
        $cs->registerCssFile($themeUrl . '/js/advanced-datatable/css/demo_table.css');
        $cs->registerCssFile($themeUrl . '/js/data-tables/DT_bootstrap.css');
        $cs->registerCssFile($themeUrl . '/css/tableTools.css');
        ?>

        <script>
            var theme_url = '<?php echo $themeUrl ?>';
        </script>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]>
        <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


    </head>
    <body>
        <section id="container">
            <!--header start-->
            <?php $this->renderPartial('//layouts/_headerBar'); ?>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <?php $this->renderPartial('//layouts/_sidebarNav'); ?>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                
                <?php echo $content; ?>
            </section>
            <!--main content end-->
        </section>
        <?php
        $cs_pos_end = CClientScript::POS_END;

        $cs->registerScriptFile($themeUrl . '/js/jquery.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery-ui/jquery-ui-1.10.1.custom.min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/bs3/js/bootstrap.min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.dcjqaccordion.2.7.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.scrollTo.min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.nicescroll.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/skycons/skycons.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.scrollTo/jquery.scrollTo.js', $cs_pos_end);
        $cs->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/calendar/clndr.js', $cs_pos_end);
        $cs->registerScriptFile('//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/calendar/moment-2.2.1.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/evnt.calendar.init.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jvector-map/jquery-jvectormap-1.2.2.min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jvector-map/jquery-jvectormap-us-lcc-en.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/css3clock/js/css3clock.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/easypiechart/jquery.easypiechart.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/sparkline/jquery.sparkline.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/morris-chart/morris.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/morris-chart/raphael-min.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.customSelect.min.js', $cs_pos_end);

        $cs->registerScriptFile($themeUrl . '/js/advanced-datatable/js/jquery.dataTables.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/data-tables/DT_bootstrap.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/tableTools.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/dynamic_table_init.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/jquery.table2excel.js', $cs_pos_end);
        $cs->registerScriptFile($themeUrl . '/js/scripts.js', $cs_pos_end);

        if ($this->uniqueid == 'admin/default' && $this->action->Id == 'index') {
//            $cs->registerScriptFile($themeUrl . '/js/gauge/gauge.js', $cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.tooltip.min.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.resize.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.pie.resize.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.animator.min.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/flot-chart/jquery.flot.growraf.js',$cs_pos_end);
//            $cs->registerScriptFile($themeUrl . '/js/dashboard.js',$cs_pos_end);
        }
        ?>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $themeUrl; ?>/js/flot-chart/excanvas.min.js"></script><![endif]-->
    </body>

</html>