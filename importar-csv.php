<!DOCTYPE html>
<html lang="pt-br">


<?php include './vendor/_head.php'?>


<body>
    <?php include './vendor/_menu.php'?>





    <section id="importar">
        <div class="container">
            <div class="row">
                <h1 class="titulo-pag col-md-12">Cadastro manual de um lançamento</h1>

                <div class="col-md-12 card py-4 px-4">
                    <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="firstName">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Fala upload de um arquivo csv</font>
                                    </font>
                                </label>
                                <input type="file" class="form-control" id="firstName" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                        </div>





                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 card py-4 px-4">
                    <button class="btn btn-warning btn-lg btn-block" type="submit" style="color:#fff;">
                            Baixe o exemplo do arquivo aqui!                       
                    </button>
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
