<?php
           include './vendor/_conecta.php';
$con = PdoConexao::getInstancia();

// listar lançamentos

$sql = "SELECT * FROM lancamento";
$buscarLancamento = $con->query($sql);


// entradas 
$sqlE = "SELECT SUM(valorL) AS entrada 
FROM lancamento WHERE  valorL > 0;";
$buscarEntrada = $con->query($sqlE);
$row = $buscarEntrada->fetch(PDO::FETCH_ASSOC);
$entrada = $row['entrada'];




// entradas 
$sqlS = "SELECT SUM(valorL) AS saida 
FROM lancamento WHERE  valorL < 0;";
$buscarSaida = $con->query($sqlS);
$row = $buscarSaida->fetch(PDO::FETCH_ASSOC);
$saida = $row['saida'];






// total 
$sqlT = "SELECT SUM(valorL) AS total 
FROM lancamento;";
$buscarTotal = $con->query($sqlT);
$row = $buscarTotal->fetch(PDO::FETCH_ASSOC);
$total = $row['total'];
?>


<!DOCTYPE html>
<html lang="pt-br">
<?php include './vendor/_head.php'?>

<body>
    <?php include './vendor/_menu.php'?>
    <section id="bloco-mostra">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="background:#5fb989;color:#fff">
                        <div class="card-body">

                            <p class="card-title text-uppercase">Entradas <span class="float-right"><i class="fas fa-level-up-alt"></i></span></p>

                            <p>
                                <?php
                                    if(!$entrada){
                                       echo "R$ 0,00" ;
                                    }else{
                                        echo $entrada;
                                    }
                                 ?>
                            </p>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card" style="background:#b95f5f;color:#fff">
                        <div class="card-body">

                            <p class="card-title text-uppercase">Saidas <span class="float-right"><i class="fas fa-level-down-alt"></i></span></p>

                            <p>
                                <?php
                                    if(!$saida){
                                       echo "R$ 0,00" ;
                                    }else{
                                        echo $saida;
                                    }
                                 ?>
                            </p>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card " id="total-card">
                        <div class="card-body">
                            <p class="card-title text-uppercase">Total <span class="float-right"><i class="fas fa-dollar-sign"></i></span></p>

                            <p>R$ <span id="total"><?php echo $total?></span></p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="listar">
        <div class="container">
            <div class="row">
                <h1 class="titulo-pag col-md-12">Lista de lançamentos</h1>

                <div class="table-responsive col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Data</th>
                                <th>Alterar | Deletar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            
                            
	                         while($row = $buscarLancamento->fetch(PDO::FETCH_ASSOC)) {
                            
                            ?>








                            <tr>
                                <td style="width:10%;">
                                    <?php echo $row['tituloL'];?>
                                </td>

                                <td id="cifrao">R$ <span class="valorLista"><?php echo $row['valorL'];?></span></td>
                                <td class="categoria"><?php if($row['categoriaL'] == 0){echo "Despesa";}else{echo "Renda";}?></td>


                                <td>
                                    <?php echo $row['dataL'];?>
                                </td>
                                <td>
                                    
                                    <!-- Modal editar-->
                                    <div class="modal fade" id="model-editar" tabindex="-1" role="dialog" aria-labelledby="model-editar-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="model-editar-label">Alterar lançamento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="user" action="./vendor/_alterar.php" method="post">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                                <label for="">Titulo do lançamento</label>
                                                                <input type="text" class="form-control form-control-user" name="lancamentoTitulo" id="lancamentoTitulo" value="<?php echo $row['tituloL']?>">
                                                                
                                                            </div>
                                                        </div>
                                                        <style>

                                                        </style>


                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <div class="form-group select-option">
                                                                    <label for="exampleFormControlSelect1">Categoria</label>
                                                                    <select class="form-control form-control-user" id="exampleFormControlSelect1" name="lencamentoCategoria">
                                                                        <option value="">Selecione o tipo</option>
                                                                        <option value="0">Despesa</option>
                                                                        <option value="1 ">Renda</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="">Valor do lançamento</label>
                                                                <input type="text" class="form-control form-control-user" name="lancamentoValor" id="lancamentoValor" value="<?php echo $row['valorL']?>">
                                                            </div>
                                                        </div>
                                                        <a href="./vendor/_alterar.php?titulo=<?php echo $row['tituloL']?>" data-id="teste" class="btn btn-primary btn-user btn-block">Altera lançamento</a>
                                                        <input type="submit" >
                                                    </form>
                                                </div>
                                                <input type="text" id="id" value="<?php echo $row['idL'];?>">
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal">Sair</button>
                                                     <a id="btn-aterar" onclick="alterar()">alterar</a>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">texto</h4>
			  </div>
			  <div class="modal-body">
				<form method="get" action="./vendor/_alterar.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-titulo" class="control-label">Titulo:</label>
					<input name="recipient-titulo" type="text" class="form-control" id="recipient-titulo">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Categoria:</label>
					<input  name="categoria" type="text" class="form-control" id="categoria">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Valor:</label>
					<input   name="valor" type="text" class="form-control" id="valor">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Data:</label>
					<input  name="data" type="text" class="form-control" id="data" >
				  </div>
				<input name="id" type="text" class="form-control" id="id-lancamento" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Alterar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
                                    
                                    
                                    
                                    
<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['idL']; ?>" data-whatevertitulo="<?php echo $row['tituloL'];  ?>" data-whatevercategoria="<?php echo $row['categoriaL'];  ?>" data-whatevervalor="<?php echo $row['valorL'];  ?>" data-whateverdata="<?php echo $row['dataL'];  ?>">Editar</button>
                                    |
<a href="./vendor/_deletar.php?idLancamento=<?php echo $row['idL']?>" class="btn btn-danger text-white" data-confirm="del">Deletar</a>

                                    <!--
                                    <button   aria-hidden="true" data-id='' data-toggle="modal" data-target="#model-deletar"  >
                                        <i class="fa fa-trash" style="cursor: pointer;">D</i></button>
                                    <input type="text" value="">
-->

                                    <!--
                                    <div class="modal fade" id="model-deletar" tabindex="-1" role="dialog" aria-labelledby="model-deletar-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="model-deletar-label">Confirmação</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Confima que quer deletar!!!
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal">Sair</button>
                                                    <a href="vendor/_deletar.php?idLancamento=" class="btn btn-secondary">Deletar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
-->

                                </td>

                            </tr>
                            <?php }?>
                            <tr>


                            </tr>




                        </tbody>

                        <tfoot>
                            <th>Titulo</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Data</th>
                            <th>Alterar | Deletar</th>

                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <!-- Modal excluir-->



    <?php include './vendor/_footer.php'?>


	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var recipienttitulo = button.data('whatevertitulo')
		  var recipientcategoria = button.data('whatevercategoria')
		  var recipientvalor = button.data('whatevervalor')
		  var recipientdata = button.data('whateverdata')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('ID ' + recipient)
		  modal.find('#id-lancamento').val(recipient)
		  modal.find('#recipient-titulo').val(recipienttitulo)
		  modal.find('#categoria').val(recipientcategoria)
		  modal.find('#valor').val(recipientvalor)
		  modal.find('#data').val(recipientdata)
		  
		})
	</script>

    <footer class="text-center footer">

        <div class="menu py-5">
            <p><a href="index.php">LISTAGEM</a> | <a href="cadastro-manual.php">CADASTRO MANUAL</a> | <a href="importar-csv.php">IMPORTAR ARQUIVO CSV.</a></p>
        </div>



    </footer>




</body>

</html>
