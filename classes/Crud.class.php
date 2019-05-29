<?php

/**
 * Description of Crud
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */

// Classe não pode ser instanciada
abstract class Crud {
   
   //protected $table;


   // Força a classe que estende Crud a definir esses métodos
   abstract protected function find($id);
   abstract protected function findAll();
   //abstract protected function insert();
   
   
   
}
