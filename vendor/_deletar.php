<?php
$idLancamento = $_GET['idLancamento'];

include '_conecta.php';

$con = PdoConexao::getInstancia();

$sqlD = "DELETE FROM lancamento WHERE idL = {$idLancamento};";
echo $sqlD;
$con->query($sqlD);

header('Location: ../index.php');
  ?>
