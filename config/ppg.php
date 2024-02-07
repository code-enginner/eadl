<?php

return [
    // Development Config For ppg
    'local' => [  
        'domain' => 'postest',
        // 'domain' => 'ipgtest',

        'password' => '%1234567890#',
        'api_url' => 'http://ppgs.icsdev.ir/v1',
        'headers' => [
            'X-API-KEY' => 'pkhins@PY5A29e9U7fwN7nGuFfR7gzK'
        ],
        'api_username' => 'pkhins',
        'api_password' => 'xQ9847UNYE95pabv',
        'registerpayment_service_id' => '9999',
        // 'registerpayment_service_id' => '9990',

        'service_registerpayment' => 'registerpayment',
        'paymentstatus_service_id' => '9999',
        // 'paymentstatus_service_id' => '9990',

        'service_paymentstatus' => 'paymentstatus',
        'userinfo_service_id' => '9999',
        // 'userinfo_service_id' => '9990',

        'service_userinfo' => 'userinfo',
        // 'validate_service_id' => '9990',
        'validate_service_id' => '9999',
        'service_validate' => 'validate',
        'timeout' => 20,
      
        'pishkhan_website' => 'https://dev.epishkhan.ir',
    ],

    // Production Config For ppg
    'production' => [
        'domain' => 'bime',
        'password' => 'BimHus#2sW%d',
        'api_url' => 'http://ppgs.epishkhan.ir/v1',
        'headers' => [
            'X-API-KEY' => 'zm5LS1Xl0dmqfZSvwuutvq0Ou2ZqiQfM'
        ],
        'api_username' => 'bime-epishkhan',
        'api_password' => 'cSA7u41T8QVUaCLz',
        'registerpayment_service_id' => '1033',
        'service_registerpayment' => 'registerpayment',
        'paymentstatus_service_id' => '1026',
        'service_paymentstatus' => 'paymentstatus',
        'userinfo_service_id' => '1026',
        'service_userinfo' => 'userinfo',
        'validate_service_id' => '1026',
        'service_validate' => 'validate',
        'timeout' => 20,
        'pishkhan_website' => 'https://epishkhan.ir',
    
    ],
    // 'api_url' => 'http://ppgs.icsdev.ir/v1/',
    // 'headers' => [
    //     'X-Api-Key' => 'qwer'
    // ],
    // 'username' => 'admin',
    // 'password' => '1234qwer',
    // 'debug' => true,
    'timeout' => 20,

    'registerPaymentMethodErrors' => [
        '-12' => 'اطلاعات شی user ناقص است',
        '-13' => 'اطلاعات شی order ناقص است',
        '-31' => ' اطلاعات شی user  خطای اعتبارسنجی دارد ',
        '-41' => ' اطلاعات شی order  خطای اعتبارسنجی دارد ',
        '-100' => 'خطای پایگاه داده'
    ],

    'paymentStatusMethodErrors' => [
        '-16' => 'ورودی ها خطای اعتبار سنجی دارد',
        '-200' => 'کد پرداخت نامعتبر است',
        '-201' => ' شناسه فاکتور نامعتبر است ',
        '-202' => ' شناسه سرویس نامعتبر است ',
    ],

];
