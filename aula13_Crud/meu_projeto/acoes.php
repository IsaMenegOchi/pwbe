<?php

require("./funcoes.php");

$novoFuncionario = [
    "id" => $_POST["idFuncionario"],
    "first_name" => $_POST["nomeFuncionario"],
    "last_name" => $_POST["sobrenomeFuncionario"],
    "email" => $_POST["emailFuncionario"],
    "gender" => $_POST["generoFuncionario"],
    "ip_address" => $_POST["enderecoIpFuncionario"],
    "country" => $_POST["paisFuncionario"],
    "department" => $_POST["departamentoFuncionario"]
];

adicionarFuncionario("./dados/empresaX.json", $novoFuncionario);

header("location: index.php");