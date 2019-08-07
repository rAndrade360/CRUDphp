<?php
  abstract class Conexao {

    public function conectaDB(){
      try {
        $con = new PDO("mysql:host=localhost;dbname=crud;charset=utf8;", "root", "");
        return $con;
      } catch (PDOException $e) {
        return $e->getMessage();
      }

    }
  }
 ?>
