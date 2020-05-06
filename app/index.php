<?php
//cargamos librerias
require_once 'config/config.php';
require_once 'helpers/url_helpers.php';

// require_once 'libs/Database.php';
// require_once 'libs/Controller.php';
// require_once 'libs/Core.php';

//Autoload php
spl_autoload_register(function($nombreClase){
    require_once 'libs/' .$nombreClase. '.php';
});

?>