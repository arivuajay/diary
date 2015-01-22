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

    //
    //Product Settings
    'LIST_PER_PAGE' => '15',
    'AMOUNT_FORMAT' => 'GBP',
    'PRICE_SYMBOL' => '&pound;&nbsp;',
    'TIME_FORMAT' => 'g:i A',
    'DATE_FORMAT' => 'Y-m-d',
    'DB_DATE_FORMAT' => 'Y-m-d',
    'DAY_FORMAT' => 'l',
    'LONG_TIME_FORMAT' => 'H:i:s',
    'LONG_DATE_FORMAT' => 'l, j F, Y',
    'SHORT_DATE_FORMAT' => 'j M, Y',
    'JS_DATE_FORMAT' => 'yy-mm-dd',
    'CAL_IMG_WIDTH' => '100',
    'CAL_IMG_HEIGHT' => '100',
    'CLASS_IMG_PATH' => 'images/class/',
    'SERVICE_IMG_PATH' => 'images/service/',
    'STAFF_IMG_PATH' => 'images/staff/',
    'CLIENT_IMG_PATH' => 'images/client/',
    'REPORT_IMG_PATH' => 'images/report/',

    'COPYRIGHT' => '&copy; 2014 Express2Help.',
    'DEVELOPEDBY' => 'Developed by <a target="_blank" href="http://www.creativert.com" alt="Creativert" title="Creativert">Creativert</a>',
    'SMS_GATEWAY_USERNAME' => 'entirx@gmail.com',
    'SMS_GATEWAY_PASSWORD' => 'mrprabha',
    'DOCTOR_PROFILE_PATH' => 'upload/doctor/',
    'PATIENT_PROFILE_PATH' => 'upload/patients/',
    'UPLOAD_FOLDER' => 'upload/sites/',
    'DIAGNOSTIC_PROFILE_PATH' => 'upload/diagnostics/',
    'GALLERY_DOCUMENT_PATH' => 'upload/gallery/',
    'REPORT_DOCTOR_PATH' => 'upload/reports/doctor/',
    'REPORT_PATIENT_PATH' => 'upload/reports/patient/',
    'REPORT_DIAGNOSTIC_PATH' => 'upload/reports/diagnostic/',
    'PATIENT_MEDICAL_DOCUMENT'=>'upload/documents/',
    'DAYOFWEEK' => 'D',
    'APP_FORMAT_DATE_TIME' => 'Y-m-d',
    'GRAM'=>'g',
    'MILLIGRAM'=>'mg',
    'MICROGRAM'=>'mcg',
);

