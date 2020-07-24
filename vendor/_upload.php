<?php   
       include './_conecta.php';
$con = PdoConexao::getInstancia();
            $destino = $_FILES["arquivo"]["tmp_name"];
            $nomeDoAquivo = $_FILES["arquivo"]["name"];
            $ext = explode('.', $nomeDoAquivo);

            $extensao = end($ext);

if($extensao != 'csv'){
    echo "extensão invalida";
}else{
     echo "foi";
    
    $objeto = fopen($destino, 'r');
    while(($dados = fgetcsv($objeto, 1000, ";")) !== false){
        $titulo = $dados[0];
        $valor =  $dados[1];
        $categoria  =  $dados[2];
        
        echo $titulo .' - '. $valor.' - '.$categoria .'<br>';
       
     $sqlU = "insert into lancamento (tituloL, valorL,categoriaL,dataL)VALUES('".$titulo."',".$valor.",'" .$categoria. "',now())";
        
        
        
        if($categoria == '0' || $categoria == 'Despesa'){
            $sqlU = "insert into lancamento (tituloL, valorL,categoriaL,dataL)VALUES('".$titulo."',-".$valor.",'" .$categoria. "',now())";
                }else{
            $sqlU = "insert into lancamento (tituloL, valorL,categoriaL,dataL)VALUES('".$titulo."',".$valor.",'" .$categoria. "',now())";
        }
        echo $sqlU;
        $con->query($sqlU);
    }
    header('Location: ../index.php');
    
}

        ?>
