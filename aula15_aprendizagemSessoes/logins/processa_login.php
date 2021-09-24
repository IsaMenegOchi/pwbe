<?php

require_once("funcoesSessao.php");


session_start();


$dados = lerArquivo("./dados/usuarios.json");


    if(isset($_POST["txtUsuario"]) && isset($_POST["senha"])){
        realizarLogin($_POST["txtUsuario"], $_POST["senha"], $dados);
    }
    
    else if($_GET["logout"]){
        finalizarLogin();
    }
    
    
//receber via post os dados do form
//chamar realizar login 