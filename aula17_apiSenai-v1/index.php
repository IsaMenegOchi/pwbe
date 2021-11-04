<?php

    //os headers devem ser os primeiros
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Content-Type: applicatiopn/json");

    include("./conection.php");
    include("./crud.php");


    //recupera o tipo da ação da requisição
    $acao = $_REQUEST["acao"];

    //*CRICAÇÃO DAS ROTAS

    //*ROTA DO READ

    if($acao == "read"){

        read($conection);
    }

    if($acao == "create"){

        $nome = $_REQUEST["nome"];
        $sobrenome = $_REQUEST["sobrenome"];
        $email = $_REQUEST["email"];
        $celular = $_REQUEST["celular"];
        $fotografia = $_REQUEST["fotografia"];

        create($nome, $sobrenome, $email, $celular, $fotografia, $conection);
    }

    //*
    


?>