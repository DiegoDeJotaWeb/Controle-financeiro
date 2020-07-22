<?php
include './_conecta.php';
$con = PdoConexao::getInstancia();

$titulo = $_GET['recipient-titulo'];
$categoria = $_GET['categoria'];
$valor = $_GET['valor'];
$data = $_GET['data'];
$id = $_GET['id'];

$sqlA = "UPDATE lancamento SET tituloL = '{$titulo}', categoriaL = '{$categoria}',  valorL = '{$valor}',  dataL = '$data' where idL = {$id};";
echo $sqlA;
$con->query($sqlA);

//header('Location:../index.php');


echo $titulo;
echo '<br>';
echo $categoria;
echo '<br>';
echo $valor;
echo '<br>';
echo $data;
echo '<br>';
echo $id;
?>

