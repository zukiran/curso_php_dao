<?php

require_once ("config.php");

  $sql = new Sql();

  $impressao = $sql->select("select *from a1");

  echo json_encode($impressao);
 ?>
