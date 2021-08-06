<style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Arial";
    }
</style>

<?php
// comentario me linha

/* 
Comentario em bloco
*/

if(isset($_REQUEST["nome"]) && isset($_REQUEST["sobrenome"]) 
    && isset($_REQUEST["idade"]) && isset($_REQUEST["linguagem"])){
    
    $nome = $_REQUEST["nome"];
    $sobrenome = $_REQUEST["sobrenome"];
    $idade = $_REQUEST["idade"];
    $linguagem = $_REQUEST["linguagem"];

    echo "<h1>Olá, $nome!!! Você tem $idade anos e sua linguagem preferida é $linguagem</h1>";
}else{

    echo "<h1>Você não enviou as informações corretamente</h1>";
}
