<?php

// Carrega as constantes usadas na url do navbar
require_once '../classes/config.php';

// Autoload das classes
spl_autoload_register(function($className) {
   if(file_exists("../classes/$className.class.php")) {
      require_once "../classes/$className.class.php";
   }
});
?>