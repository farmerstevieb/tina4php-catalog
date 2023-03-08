<?php

use Tina4\Config;
use Tina4\Module;

Module::addModule("Catalog Module", "1.0.0", "tina4catalog", static function (Config $config) {
    $twigNameSpace = "@tina4catalog";
    (new Catalog())->addConfigMethods($config);
    (new Catalog())->addCmsMenu("/catalog/dashboard", "Catalog");

});