<?php
  include "conexao.php";

  class ClassCrud extends Conexao{
    private $crud;
    private $contador;

    public function prepareStetment($query, $parametros){
      $this->countParametros($parametros);
      $this->crud = $this->conectaDB()->prepare($query);

      if($this->contador>0){
        for($i=1; $i<=$this->contador;$i++){
          $this->crud->bindValue($i, $parametros[$i-1]);
        }
      }

      $this->crud->execute();
    }

    private function countParametros($parametros){
      $this->contador = count($parametros);
    }

    public function insertDB($tabela, $condicao, $parametros){
        $this->prepareStetment("INSERT INTO $tabela VALUES ($condicao)", $parametros);
        return $this->crud;
    }

    public function selectDB($campos, $tabela, $condicao, $parametros){
        $this->prepareStetment("SELECT $campos FROM $tabela $condicao", $parametros);
        return $this->crud;
    }

    public function updateDB($tabela, $set, $condicao, $parametros){
      $this->prepareStetment("UPDATE $tabela SET $set WHERE id=$condicao", $parametros);
      return $this->crud;
    }

    public function deleteDB($tabela, $condicao, $parametros){
      $this->prepareStetment("DELETE FROM $tabela WHERE $condicao", $parametros);
      return $this->crud;
    }
  }
 ?>
