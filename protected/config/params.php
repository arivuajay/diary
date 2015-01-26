<?php
$whitelist = array( '127.0.0.1', '::1' );
if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) ){
    $mailsendby = 'smtp';
}else{
    $mailsendby = 'phpmail';
}

// Custom Params Value
return array(
    //Global Settings
    'EMAILLAYOUT' => 'file', // file(file concept) or db(db_concept)
    'EMAILTEMPLATE' => '/mailtemplate/',
    'MAILSENDBY'=>  $mailsendby,
    //EMAIL Settings
    'SMTPHOST'=>'smtp.gmail.com',
    'SMTPPORT'=>'465',  // Port: 465 or 587
    'SMTPUSERNAME'=>'marudhuofficial@gmail.com',
    'SMTPPASS'=>'ninja12345',
    'SMTPAUTH'=>true,    // Auth : true or false
    'SMTPSECURE'=>'ssl', // Secure :tls or ssl

    'NOREPLYMAIL'=>'noreply@express2help.com',
    'SITENAME'=>'Express 2 Help',
    'JS_SHORT_DATE_FORMAT' => 'yy-mm-dd',
    'PHP_SHORT_DATE_FORMAT' => 'Y-m-d',

    //
    //Product Settings
    'JOURNAL_IMG_PATH' => 'uploads/journal/',
    'COPYRIGHT' => '&copy; 2014 Express2Help.',
);

