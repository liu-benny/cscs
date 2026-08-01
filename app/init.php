<?php 
    require_once __DIR__ . '/config/config.php';
    require_once __DIR__ . '/core/helper.php';

    spl_autoload_register(function($className){
        require_once __DIR__ . '/core/' . $className . '.php';
    });