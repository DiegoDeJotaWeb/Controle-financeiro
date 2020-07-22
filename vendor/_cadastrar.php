<?php
include './_conecta.php';
$con = PdoConexao::getInstancia();

$tituloLancamento = $_GET["tituloLancamento"];
$valorLancamento = $_GET["valorLancamento"];
$categoriaLancamento = $_GET["categoriaLancamento"];

$sqlC = "INSERT INTO lancamento (tituloL, valorL,categoriaL, dataL)VALUES('{$tituloLancamento}', {$valorLancamento},'{$categoriaLancamento}',now())";
echo $sqlC;
$con->query($sqlC);

header('Location:../index.php');


?>