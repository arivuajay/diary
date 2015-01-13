<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Express 2 Help',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        'site', 'admin',
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'diary123',
//            'generatorPaths' => array('application.gii'),
            'generatorPaths' => array('application.gii'),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        //
        'clientScript' => array(
            'packages' => array(
                'jquery' => array(
                    'baseUrl' => '//ajax.googleapis.com/ajax/libs/jquery/1/',
                    'js' => array('jquery.min.js'),
                )
            ),
        ),
        //
        //local mail components
        //
        'user' => array('allowAutoLogin' => true),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => require(dirname(__FILE__) . '/urlManager.php'),
        ),
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'Smtpmail' => array(
            'class' => 'application.extensions.smtpmail.PHPMailer',
            'Host' => "smtp.gmail.com",
            'Username' => 'prakash.paramanandam@arkinfotec.com',
            'Password' => 'prakashpp123',
            'Mailer' => 'smtp',
            'Port' => 587,
            'SMTPAuth' => true,
            'SMTPSecure' => 'tls',
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
    //setting the basic language value
    'defaultController' => 'site/default/index',
    'params' => require(dirname(__FILE__) . '/params.php'),
    'timeZone' => 'Asia/Calcutta',
    'theme' => 'site',
    'sourceLanguage' => 'en',
    'language' => 'en_US',
);
