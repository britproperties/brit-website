<?php
// Copy this file to config/credentials.php (which is gitignored) and fill in
// real values per environment. db.php loads it automatically if present.
return [
    'development' => [
        'host' => 'localhost',
        'name' => 'brit_app',
        'user' => 'root',
        'pass' => '',
    ],
    'production' => [
        'host' => 'localhost',
        'name' => 'britproperty_app',
        'user' => 'britproperty_app',
        'pass' => 'CHANGE_ME',
    ],
];
