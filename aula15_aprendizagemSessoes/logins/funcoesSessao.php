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
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header("location: ../meu_projeto/index.php");
            exit;
        }
    }

        header("location: index.php");
}


//*PROF

    //Função de verificação de login

    function verificarLogin(){
        if($_SESSION['id'] != session_id() || (empty($_SESSION['id']))){
            header("location: ../logins/index.php");
        }
    }

    //Funções de finalizar login

    function finalizarLogin(){
        //? Limpa todas as variaveis de sessão
        session_unset();
        //? Destroi a sessão ativa
        session_destroy();

        header("location: ./index.php");
    }