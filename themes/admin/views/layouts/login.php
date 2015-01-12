<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>">
        <?php
        $themeUrl = Yii::app()->theme->baseUrl;
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($themeUrl . '/bs3/css/bootstrap.min.css');
        $cs->registerCssFile($themeUrl . '/css/bootstrap-reset.css');
        $cs->registerCssFile($themeUrl . '/font-awesome/css/font-awesome.css');
        $cs->registerCssFile($themeUrl . '/css/style.css');
        $cs->registerCssFile($themeUrl . '/css/style-responsive.css');
        ?>

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]>
        <script src="<?php echo $themeUrl; ?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">
        <div class="container">
            <?php echo $content; ?>
        </div>
        <?php
        $cs->registerScriptFile($themeUrl . '/js/jquery.js');
        $cs->registerScriptFile($themeUrl . '/bs3/js/bootstrap.min.js');
        ?>
        <!-- Placed js at the end of the document so the pages load faster -->
    </body>
</html>
