<?php
require("funcoes.php");

    session_start();

    if(isset($_POST["usuario"]) && isset($_POST["senha"])){
        realizarLogin($_POST["usuario"], $_POST["senha"], lerArquivo("usuario.json"));
        header("location: area_restrita.php");

    $_SESSION["usuario"] = $_POST["usuario"];
    }
    
    

//receber via post os dados do form
//chamar realizar login