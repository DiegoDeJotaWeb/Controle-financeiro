<!DOCTYPE html>
<html lang="pt-br">


    <?php include './vendor/_head.php'?>
 

<body>
    <?php include './vendor/_menu.php'?>



 

    <section id="listar">
        <div class="container">
            <div class="row">
                <h1 class="titulo-pag col-md-12">Cadastro manual de um lançamento</h1>

                <div class="col-md-12 card py-4 px-4">
                     <form class="needs-validation" novalidate="" method="get" action="vendor/_cadastrar.php">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Titulo do lançamento</font></font></label>
                <input type="text" class="form-control" id="tituloLancamento" name="tituloLancamento" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              </div>
              <hr class="mb-4">
              <div class="row">
              
              <div class="col-md-6 mb-3">
                <label for="country"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria</font></font></label>
                <select class="custom-select d-block w-100" id="country" required="" name="categoriaLancamento">
                  <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Escolher...</font></font></option>
                  <option value="Renda"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Renda</font></font></option>
                  <option value="Despesa"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Despesa </font></font></option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              
              <div class="col-md-6 mb-3">
                <label for="lastName"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor do lançamento</font></font></label>
                <input type="text" class="dinheiro form-control" id="valorLancamento" name="valorLancamento" placeholder="" value="" required="" >
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>               
            </div>

         
          
           
            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Cadastrar lançamento">
          </form>
                </div>
            </div>
        </div>
    </section>








<?php include './vendor/_footer.php'?>



    <footer class="text-center footer">
       
        <div class="menu py-5">
            <p><a href="index.php">LISTAGEM</a> | <a href="cadastro-manual.php">CADASTRO MANUAL</a> | <a href="importar-csv.php">IMPORTAR ARQUIVO CSV.</a></p>
        </div>

       

    </footer>
</body>

</html>

          