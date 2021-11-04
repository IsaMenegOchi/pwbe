<?php

$serverName = 'localhost';
$userName = 'root';
$passaword = 'bcd127';
$dataBase = 'cadastro';

//estamos utilizando um novo metodo construtor pedindo objetos para fazer conexão
$conection = new mysqli($serverName, $userName, $passaword, $dataBase);

if ($conection->connect_error) {
    die("Connection error: " . $conection->connect_error);
}

return $conection;

?>