<?php

session_start();
require_once('bd_classe.php');


$email = $_POST['email'];

$senha = md5($_POST['senha']);

$sql = "SELECT id_usuario, email, usuario FROM usuarios WHERE email = '$email' AND senha = '$senha'";

$instancia_bd = new bd();
$link = $instancia_bd->conexaoBD(); 



$resultado_id = mysqli_query($link, $sql);



if ($resultado_id) {
  $dados_usuario = mysqli_fetch_array($resultado_id );


   if(isset($dados_usuario['email'])){

        $_SESSION['id_usuario'] = $dados_usuario['id_usuario'];
        $_SESSION['email'] = $dados_usuario['email'];
        $_SESSION['usuario'] =  $dados_usuario['usuario'];

   			header('Location: home.php');


   	
   }else{
   		    header('Location: index.php?erro=1');
   	
   	   }
	# code...
   }else{
		   echo "Erro ao conectar no banco de dados";

}



?>