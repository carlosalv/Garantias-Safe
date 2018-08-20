<?php

require_once('bd_classe.php');

$usuario = $_POST['usuario'];

$email = $_POST['email'];

$senha =  md5($_POST['senha']);

$usuario_existe = false;
$email_existe = false;

$instancia_bd = new bd();

$link = $instancia_bd->conexaoBD(); 

//verifica se ja existe usuario
$sql= "select * from usuarios where usuario = '$usuario'";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);
		

		if (isset($dados_usuario['usuario'])) {

			$usuario_existe = true;
			# code...
		}

	}else{
		echo "erro ao verificar usuario existente";


	}

	//verifica se o email ja esta cadastrado
	$sql= "select * from usuarios where email = '$email'";

	if($resultado_id = mysqli_query($link, $sql)){

		$dados_usuario = mysqli_fetch_array($resultado_id);
		

		if (isset($dados_usuario['email'])) {

			$email_existe = true;
			# code...
		}

	}else{
		echo "erro ao verificar usuario existente";


	}

	if ($usuario_existe || $email_existe) {

		$retorno_get = '';

		if ($usuario_existe) {
			$retorno_get.="erro_usuario=1&";

			# code...
		}

		if ($email_existe) {

			$retorno_get.="erro_email=1&";
			# code...
		}

			header('Location: cadastrarUser.php?'.$retorno_get);
			die();
		# code...
	}


  $sql = "insert into usuarios(usuario, email, senha)
		values('$usuario','$email','$senha')";

	//executa conexao..
	if(mysqli_query($link, $sql)){

		echo "Usuario cadastrado com sucesso";

	}else{
		echo "Erro ao cadastrar usuario";
	}


?>