<?php

class bd{

//host
	private $host = 'localhost';
//usuario
	private $user = 'root';
//senha
	private $password = '';
//banco	
	private $database = 'garantias_safe2';



	public function conexaoBD(){

		//cria a conexao com o banco...
		$con = mysqli_connect($this->host, $this->user, $this->password, $this->database);


		//ajustar o charset..
		mysqli_set_charset($con, 'utf8');

		//mensagem de erro..
		if(mysqli_connect_errno()){
			echo "erro ao se conectar com o banco de dados" .mysqli_connect_error();


		}

		return $con;




	}

}


?>