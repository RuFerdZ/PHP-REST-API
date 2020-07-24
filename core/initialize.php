<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp'.DS.'htdocs'.DS.'Sample'); 
    defined('CONN_PATH') ? null : define('CONN_PATH', SITE_ROOT.DS.'connection');
    defined('MODEL_PATH') ? null : define('MODEL_PATH', SITE_ROOT.DS.'models');

    // load config file
    require_once(CONN_PATH.DS."connection.php");

    //core classes
    require_once(MODEL_PATH.DS."Course.php");
?>