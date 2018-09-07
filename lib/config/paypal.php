<?php
return [
    // Client ID của app mà bạn đã đăng ký trên PayPal Dev
    'client_id' => 'AYztzioBspRwTUvQXtho7AXRvAZm6euxabGYGGETDVOb1KlakNOAzxX_CjcfZqxScX2dpZGFKFvOuJTf',
    // Secret của app
    'secret' => 'ECRyUQWM8UkCPqgDF0l2aw7uXcgWOzHtltyp2Il3C0pFHJdFJceabpStM4e0ihXAsQeCy0nQ9uOoz4TX',
    'settings' => [
        // PayPal mode, sanbox hoặc live
        'mode' => 'sandbox',
        // Thời gian của một kết nối (tính bằng giây)
        'http.ConnectionTimeOut' => 30,
        // Có ghi log khi xảy ra lỗi
        'log.logEnabled' => true,
        // Đường dẫn đền file sẽ ghi log
        'log.FileName' => storage_path() . '/logs/paypal.log',
        // Kiểu log
        'log.LogLevel' => 'INFO'
    ],
];