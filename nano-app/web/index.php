<?php

require_once __DIR__ . '/../vendor/autoload.php';

// $dsn = getenv('DSN') ? getenv('DSN') : 'sqlite::memory:';
$dsn = getenv('DSN') ? getenv('DSN') : 'sqlite:/tmp/test.db';

$counter = new Counter(new PDO($dsn));

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': echo $counter->getCurrentCounter(); break;
    case 'PUT': $counter->increaseCounter(); echo "OK"; break;
    case 'DELETE': $counter->reset(); echo "OK"; break;
}


