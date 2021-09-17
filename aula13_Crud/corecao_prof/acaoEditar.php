<?php

    require ("./funcoes.php");
    //array/indice numerico - com numeros
    //array literal - string

    $novoFuncionario = [
        "id" => $_POST["id"],
        "first_name" => $_POST["first_name"],
        "last_name" => $_POST["last_name"],
        "email" => $_POST["email"],
        "gender" => $_POST["gender"],
        "ip_address" => $_POST["ip_address"],
        "country" => $_POST["country"],
        "department" => $_POST["department"]
    ];

    // var_dump($_POST["id"]);exit;
//pega o arquivo jsom
//procura o id
//atualiza os dados que editamos
//devemos colocar como parametros a nova atualização, ou seja, o array que criamos acima
    editarFuncionario("./dados/empresaX.json", $novoFuncionario);

    header("location: index.php");