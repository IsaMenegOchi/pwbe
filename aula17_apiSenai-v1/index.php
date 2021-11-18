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

    //?CRICAÇÃO DAS ROTAS

    //*ROTA DO READ

    if($acao == "read"){

        read($conection);
    }

    if($acao == "readID"){

        $cod_pessoa = $_REQUEST["cod_pessoa"];

        readID($cod_pessoa, $conection);
    }

    if($acao == "create"){

        $nome = $_REQUEST["nome"];
        $sobrenome = $_REQUEST["sobrenome"];
        $email = $_REQUEST["email"];
        $celular = $_REQUEST["celular"];
        $fotografia = $_REQUEST["fotografia"];

        create($nome, $sobrenome, $email, $celular, $fotografia, $conection);
    }

    if($acao == "update"){

        $cod_pessoa = $_REQUEST["cod_pessoa"];

        $nome = $_REQUEST["nome"];
        $sobrenome = $_REQUEST["sobrenome"];
        $email = $_REQUEST["email"];
        $celular = $_REQUEST["celular"];
        $fotografia = $_REQUEST["fotografia"];

        update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $conection);
    }

    if($acao == "delete"){

        $cod_pessoa = $_REQUEST["cod_pessoa"];

        delete($cod_pessoa, $conection);
    }

    


?>