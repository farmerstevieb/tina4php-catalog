<?php

use Tina4\Config;
use Tina4\DataSQLite3;
use Tina4\Tina4Php;
use function Tina4\Initialize;

require_once "./vendor/autoload.php";

global $DBA;
$DBA = new DataSQLite3("catalog.db");

$config = new Config(function($config) {
    (new Catalog())->addConfigMethods($config);
});

Initialize();

echo new Tina4Php($config);