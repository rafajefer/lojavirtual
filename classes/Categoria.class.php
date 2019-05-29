<?php

/**
 * Description of Categoria
 *
 * @author Rafael Jeferson <rafa.jefer@gmail.com>
 * @tutorial package
 */
class Categoria extends Crud {
   
   private $table = 'categoria';  
   
   
   protected function find($id) {
      
   }

   public function findAll() {
      $result = array();
      $sql = "SELECT * FROM {$this->table}";
      $stmt = Conexao::prepare($sql);
      $stmt->execute();
      if($stmt->rowCount() > 0) {
         $result = $stmt->fetchAll();
      }
      return $result;
   }

   protected function insert() {
      
   }

}
