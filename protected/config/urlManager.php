<?php

return array(
    'gii' => 'gii',
    'gii/<controller:\w+>' => 'gii/<controller>',
    'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
//    '<controller:\w+>/<id:\d+>' => '<controller>/view',
//    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    'login' => '/site/users/login',
    'viewjournal_<id:\w+>' => '/site/journal/view',
    'updatejournal_<id:\w+>' => '/site/journal/update',
    'page_<slug:\w+>' => '/site/cms/view',
    'contact' => '/site/contact/create',
    'feedback' => '/site/feedback/create',
    'dashboard' => '/site/journal/dashboard',
    'category' => 'site/category/index',
    'faq' => '/site/faq',
    'write-journal' => '/site/journal/create',
    'profile' => '/site/users/myprofile',
);
