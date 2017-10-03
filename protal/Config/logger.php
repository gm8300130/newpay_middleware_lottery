 <?php
return [      
    'logger' => [
        //'channel' => 'vip500',
        'name' => 'slim-app',
        'path' => __DIR__ . '/../logs/vip500-' . date('Y-m-d') . '.log',
        'level' => \Monolog\Logger::DEBUG,
    ],
];