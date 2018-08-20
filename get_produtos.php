

<?php

session_start();

if(!isset($_SESSION['email'])){

  header('Location: index.php?erro = 1');

}

require_once('bd_classe.php');
$id_usuario =   $_SESSION['id_usuario'];

$instancia_bd = new bd();

$link = $instancia_bd->conexaoBD(); 

		
	 $sql = "SELECT * FROM  produtos AS p WHERE id_usuario = $id_usuario 
	 		 ORDER BY data_inicio DESC";
 		
	$resultado_id = mysqli_query($link, $sql);


	if($resultado_id){

			//tutulos das tabelas..
		echo '<table class="table table-striped">

			<thead>

		<tr>
		
            <th>Produto</th>
            <th>Loja</th>
            <th>Valor</th>
        	<th>Inicio</th>
        	<th>Final</th>
        </tr>
 
        	</thead>

			</table>';
			 


		while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
			
			//dados do usuario..
			echo '<table class="table table-striped">';

			echo '<tbody>';
				echo '<tr>
				         <td><a href="#"  data-toggle="modal" 
				         data-target="#exampleModal">
                             '.$registro['nome_produto'].'</a></td>'.
						'<td>'.$registro['nome_loja'].'</td>'.
					    '<td>'.$registro['valor'].'</td>'.
					    '<td>'.$registro['data_inicio'].'</td>'.
					    '<td>'.$registro['data_final'].'</td>'.
					     '<td><a href="#">
					     <span class="glyphicon glyphicon-trash" 
					     data-toggle="modal" 
				         data-target="#exampleModalExcluir">
					     </span>
					     </a></td>';


				echo'</tr>';


			echo '</tbody>';

				


			echo '</table>';
			
			

		}


	}else{

		echo "Erro na consulta de dados";

	}

	


?>