<?php
include 'class/ClassCrud.php';
$crud = new ClassCrud();
$crud -> deleteDB("cadastro", "WHERE id=?", array(1));
