<?php

 session_start();

 if(!isset($_SESSION['email'])){

   header('Location: home.php?erro = 1');
   echo  "erro ao excluir dados";

 }

 require_once('bd_classe.php');
 $id_usuario =  $_SESSION['id_usuario'];

 $instancia_bd = new bd();

 $link = $instancia_bd->conexaoBD(); 

 $sql = "DELETE  FROM  produtos  WHERE id_usuario = $id_usuario";

 $resultado_id = mysqli_query($link, $sql);

 	if ($resultado_id) {
 		header('refresh:1; home.php');

 		# code...
 	}else{
 		echo "não deletado";
 	}


?>