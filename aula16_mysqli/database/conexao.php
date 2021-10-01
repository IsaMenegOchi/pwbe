<?php

/* PARAMETROS DE CONEXÃO MSQLI

1- host -> onde o banco de dados esta rodando
2- user -> usuário do banco de dados
3- passaword -> senha do usuario do banco de dados
4- database -> nome do banco de dados

*/

//! BOA PRÁTICA
//* colocar o nome das const com maiusculas
const HOST = "localhost";
const USER = "root";
const PASSAWORD = "bcd127";
const DATABASE = "icatalogo";

//ela se conecta ao banco de dados 
$conexao = mysqli_connect(HOST, USER, PASSAWORD, DATABASE);

if ($conexao === false) {
    die(mysqli_connect_error());

}

// echo "<pre>";
// var_dump($conecao);
// echo "</pre>";


