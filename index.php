<?php

require_once ("config.php");

  $sql = new Sql();

  $impressao = $sql->select("select *from a1");

  echo json_encode($impressao);


// carrega um usuario expecifico>
$nome = new Usuario();
$nome->loadById(12);
echo "<p>usuario expecifico<p>".$nome;

// //carrega todos os usurios ordenando pelo nome>
$todos = Usuario::getList();
echo "<p>aqui usou o get list<p>";
echo json_encode($todos);

// carrega somente o selecionado>
$like = Usuario::search("a");
echo "<p>foi o selecionado<p>";
echo json_encode($like);

//carrega um login com usuario e senha>

 $usuario = new Usuario();
 $usuario->login("jao da terra", "12311123");
 echo "$usuario";



 ?>
