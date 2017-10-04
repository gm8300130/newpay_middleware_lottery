 <?php
return [      
    'logger' => [
        'name' => 'slim-app',
        'path' => LOG_PATH . '/slim-' . date('Y-m-d') . '.log',
        'level' => \Monolog\Logger::DEBUG,
    ],
];