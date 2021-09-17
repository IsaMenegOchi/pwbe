<?php

    function lerArquivo($nomeArquivo){

    $arquivo = file_get_contents($nomeArquivo);

    $arquivoArr = json_decode($arquivo);

    return $arquivoArr;

    }

//REALIZAR LOGIN
    /*

    1- Usuario vindo de fora
    2- senha vindo de fora
    3- dados arquivo json
    */ 

function realizarLogin($usuario, $senha, $dados){

    foreach ($dados as $dado) {

        if ($dado->usuario == $usuario && $dado->senha == $senha) {
            
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["dara_hora"] = date('d/m/Y - h:i:s');

            header("location: areaRestrita.php");
            exit;
        }

        else{
            header("location: index.php"); 
        }
    }
}