<?php

// Carrega as constantes usadas na url do navbar
require_once 'classes/Config.php';

// Autoload das classes
spl_autoload_register(function($className) {
   // Carrega classes no site principal
   if (file_exists("./classes/$className.class.php")) {
      require_once "./classes/$className.class.php";
   } else { // Carrega classes no admin
      // Inclui classe se for chamada direto no arquivo
      if (file_exists("../classes/$className.class.php")) {
         require_once "../classes/$className.class.php";
      } else {
         // Inclui classe que for chamada no arquivo que será puxado no ajax
         if (file_exists("../../../classes/$className.class.php")) {
            require_once "../../../classes/$className.class.php";
         } else {
            die("<p>classe não encontrada</p>");
         }
      }
   }
});
