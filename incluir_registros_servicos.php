<?php

session_start();

if(!isset($_SESSION['email'])){

  header('Location: index.php?erro = 1');

}
require_once('bd_classe.php');


 $id_usuario =   $_SESSION['id_usuario'];
 $nome_servico = $_POST['nome_servico'];
 $nome_loja =    $_POST['nome_loja'];
 $valor =        $_POST['valor_servico'];
 $data_inicio =  $_POST['data_inicio'];
 $data_final =   $_POST['data_final'];

$instancia_bd = new bd();

$link = $instancia_bd->conexaoBD(); 


	$sql = "INSERT INTO 
 		servicos
 		(id_usuario, nome_servico, nome_loja, valor, data_inicio, data_final)
 		VALUES
  		($id_usuario,'$nome_servico', '$nome_loja', '$valor', '$data_inicio', '$data_final')";


     mysqli_query($link, $sql);


 
	// $instancia_bd = new bd();

	// $link = $instancia_bd->conexaoBD(); 
 //     //servicos salvos
	// $id_usuario =   $_SESSION['id_usuario'];
	// $nome_servico = $_POST['nome_servico'];
	// $nome_loja =    $_POST['nome_loja'];
	// $valor =        $_POST['valor_servico'];
	// $data_inicio =  $_POST['data_inicio'];
	// $data_final =   $_POST['data_final'];
     
 // 


?>