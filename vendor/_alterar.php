<?php
include './_conecta.php';
$con = PdoConexao::getInstancia();

$titulo = $_GET['recipient-titulo'];
$categoria = $_GET['categoria'];
$valor = $_GET['valor'];
$data = $_GET['data'];
$id = $_GET['id'];

$ex = explode(',', $valor);
$ex1 = reset($ex);
$ex2 = end($ex);
//$teste1 = each($teste);
//$teste2 = reset($teste);

echo $ex1;
echo '<br>';
echo $ex2;
echo '<br>';
//$afi = $teste2.$teste1;
$tirarVirgula = str_replace('.' , '', $ex1);

$valorLimpo =  $tirarVirgula . '.' . $ex2;

//$limpar = preg_replace('/[^0-9]/', '', $valor);

//$teste = substr($limpar, -2);
//$teste = substr($limpar, -2);

//echo $teste;
//echo '<br>';
//echo $limpar;

//$tirarVirgula = str_replace(',' , '.', $valor);
//$TirarPonto = str_replace('.'/2/ , 2, $tirarVirgula);
////$valorFormatado = $TirarPonto;
//echo $TirarPonto;


if($categoria == '0' || $categoria == 'Despesa'){
$sqlA = "UPDATE lancamento SET tituloL = '{$titulo}', categoriaL = '{$categoria}',  valorL = -{$valorLimpo},  dataL = '$data' where idL = {$id};";
}else{
$sqlA = "UPDATE lancamento SET tituloL = '{$titulo}', categoriaL = '{$categoria}',  valorL = {$valorLimpo},  dataL = '$data' where idL = {$id};";
}


echo $sqlA;
$con->query($sqlA);

//header('Location:../index.php');

?>

