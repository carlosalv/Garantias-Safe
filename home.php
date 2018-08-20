<?php

session_start();

if(!isset($_SESSION['email'])){

  header('Location: index.php?erro = 1');

}


?>

<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">

    <title>Garantias Safe</title>
    
    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    
</style>

    <!--manipulacao de eventos com javascript-->
    <script type="text/javascript">

  
    $(document).ready(function(){

      //salvar produtos..
      $('#btn_salvar_produto').click(function(){

        if ( $('#nome_produto').val().length > 0 
          && $('#nome_loja').val().length > 0 
          && $('#valor_produto').val().length > 0
          && $('#data_inicio').val().length > 0
          && $('#data_final').val().length > 0) {

          $.ajax({

            url: 'incluir_registros.php',
            method: 'post',
            data: $('#id_produto').serialize(),
            success: function(data){
              
            }

          });

        }


      });

      //excluindo Produtos  via ajax..
      $('#btn_excluir').click(function(){
          $.ajax({
            url: 'deletar.php',
            method: 'post',
            data: $('#id_produto').serialize(),
            success: function(data){
               
            }

          });

        


      });

      //salvar servicos...
       $('#btn_salvar_servico').click(function(){
           

        if (  $('#nome_servico').val().length > 0 
           && $('#nome_loja').val().length > 0 
           && $('#valor_servico').val().length > 0
           && $('#data_inicio').val().length > 0
           && $('#data_final').val().length > 0) {
             
          $.ajax({
            url: 'incluir_registros_servicos.php',
            method: 'post',
            data: $('#id_servico').serialize(),
            success: function(data){
              atualizaProdutos();

            }

          });
        }
      });

       function atualizaProdutos(){

        $.ajax({

          url:'get_produtos.php',
          success: function(data){
            $('#id_lista').html(data);
            
          }



        });

       }

       atualizaProdutos();

       

    });

//$('#myModal').on('shown.bs.modal', function () {
  //$('#myInput').trigger('focus')
//})

    </script>
  
  </head>

  <body>

    <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-fixed" 
           style="background-color: rgba(24, 79, 229, 0.9)">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <img src="imagens/icone_twitter.png" />
          </div>
          
          <div id="navbar" class="navbar-collapse collapse" style="color: white">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <h4>Bem vindo<h4>
                  
                 <?=
                  $_SESSION['email'];
                  
                  ?>
                  
              </li>
              <!--SAIR-->

              <li>
                <a href="sair.php"><span class="glyphicon glyphicon-log-out" 
                  style="color: white"> 
             
              </span></a></li>

              </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>
  </div>
</div>

      </nav>

</div> <!--formulario produtos -->
                  
          <form id="id_produto">
          <div class="col-md-6">
            <nav arial-label="breadcrumb ">
              <ol class="breadcrumb">
                
               <li class="breadcrumb-item active" aria-current="page">
                 <h3>Cadastro de Produtos</h3>
                 
                 <p>Nome do Produto</p>
                 <input id="nome_produto" name="nome_produto" type="text"></input>
                 <p>Nome da Loja</p>
                  <input id="nome_loja" name="nome_loja" type="text"></input>
                  <p>Valor do Produto</p>
                  <input id="valor_produto" name="valor_produto" type="text"></input>
                  
                  <li class="breadcrumb-item active" aria-current="page">
                <p>Duração da Garantia</p>
                  <p>Inicio</p><input id="data_inicio" name="data_inicio" type="date"></input> 
                  
                  <p>Final</p><input id="data_final" name="data_final" type="date"></input> 

                </li>
                

                <li class="breadcrumb-item active" aria-current="page">
                 <button id="btn_salvar_produto" class="btn btn-success">salvar</button>
               </li>


               </li>
                  
               </li>
             </ol>

           </nav>

           <table id="id_lista" class="table table-striped">


          </table>


          <div>



          </div>
        </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
        
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
        <button type="button" class="btn btn-primary">Salvar dados</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal exluir -->
<div class="modal fade" id="exampleModalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 style="color: white" class="modal-title" id="exampleModalLabel">EXCLUIR ITEM</h3>
        
      </div>
      <div class="modal-body">
       <h3 style="color: black" class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir!!</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button id="btn_excluir" type="button" class="btn btn-danger">Sim</button>
      </div>
    </div>
  </div>
</div>
      </form>


      <!--formulario serviços -->
        <form id="id_servico">
          <div class="col-md-6">
            <nav arial-label="breadcrumb ">
              <ol class="breadcrumb">
               
                <li class="breadcrumb-item active" aria-current="page">
                  <p style="color: red">Não está funcionando!!</p>
                  <h3>Cadastro de Serviços</h3>
                  <p>Nome do Serviço</p>
                  <input id="nome_servico" name="nome_servico" type="text"></input>
                  <p>Nome da Loja</p>
                  <input id="nome_loja" name="nome_loja" type="text"></input>
                  <p>valor</p>
                  <input id="valor_servico" name="valor_servico" type="text"></input>


                  <li class="breadcrumb-item active" aria-current="page">
                <p>Duração da Garantia</p>
                  <p>Inicio</p><input id="data_inicio" name="data_inicio" type="date"></input> 
                  
                  <p>Final</p><input id="data_final" name="data_final" type="date"></input> 

                </li>


                </li>
                <li class="breadcrumb-item active" aria-current="page">
                 <button id="btn_salvar_servico" class="btn btn-success">salvar</button>
               </li>
               

               </li>

               </li>
             </ol>
         </nav>


          </div>
           
        </form>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  </body>
</html>