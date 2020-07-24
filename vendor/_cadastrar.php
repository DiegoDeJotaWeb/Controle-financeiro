<?php
include './_conecta.php';
$con = PdoConexao::getInstancia();

$tituloLancamento = $_GET["tituloLancamento"];
$valorLancamento = $_GET["valorLancamento"];
$categoriaLancamento = $_GET["categoriaLancamento"];

//$tirarVirgula = str_replace(',' , '', $valorLancamento);
//$TirarPonto = str_replace('.' , '', $tirarVirgula);
//$valorFormatado = $TirarPonto;

$ex = explode(',', $valorLancamento);
$ex1 = reset($ex);
$ex2 = end($ex);
$tirarVirgula = str_replace('.' , '', $ex1);

$valorLimpo =  $tirarVirgula . '.' . $ex2;





if($categoriaLancamento == 'Despesa'){
$sqlC = "INSERT INTO lancamento (tituloL, valorL,categoriaL, dataL)VALUES('{$tituloLancamento}', -{$valorLimpo},'{$categoriaLancamento}',now())";
}else{
$sqlC = "INSERT INTO lancamento (tituloL, valorL,categoriaL, dataL)VALUES('{$tituloLancamento}', {$valorLimpo},'{$categoriaLancamento}',now())";
}
echo $sqlC;
$con->query($sqlC);

header('Location:../index.php');


?>