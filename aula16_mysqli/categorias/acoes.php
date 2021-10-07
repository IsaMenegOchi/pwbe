<?php
session_start();

//*CONEXÃO COM BANCO DE DADOS
require_once("../database/conexao.php");

//*FUNÇÃO DE VALIDAÇÃO
function validaCampos(){
    $erros = [];

    if(!isset($_POST['descricao']) || $_POST['descricao'] == ""){
        $erros[] = "O campo descrição é de preenchimento obrigatório";
    }

    return $erros;
}

/*
    ? TRATAMENTO DOS DADOS VINDOS DO FORMULARIO
        - tipos da ação
        - execução dos processos da ação solicitada
*/

//* METODOS PARA PEGAR ENVIO DE "FORMULÁRIOS"
switch ($_POST["acao"]) {

    case 'inserir':

    //chamada da função de validação de erros
    $erros = validaCampos();

    //verificar se existem erros:
    if(count($erros) > 0){
        $_SESSION["erros"] = $erros;
        header("location: index.php");
        exit; 
    }

        //Variavel descrição recebe via post o name "descricao" de um input 
        $descricao = $_POST["descricao"];

        //Variavel faz Inserção Em tbl_categoria (no atributo descricao) com o valor da variavel descricao
            //?devemos cercar a variavel com aspas simples
            //?tudo o que ela não souber interpretar ele vai mandar como string(se tudo fo com aspas simples)

        $sql = "INSERT INTO tbl_categoria (descricao) VALUES ('$descricao')";

        /*
        ? mysql_query parametros:
        ?   1 - Uma conexão aberta e válida
        ?   2 - Uma instrução sql válida
        */

        // Variavel resultado recebe uma função que envia o que queremos, que no caso é a conexao
        $resultado = mysqli_query($conexao, $sql); //?executa uma consulta no banco

        header("location: index.php");
        
    break;
    

    case "deletar":
        // 
        $idCategoria = $_POST["categoriaId"];

        $sql = "DELETE FROM tbl_categoria WHERE id = $idCategoria";
            
        $resultado = mysqli_query($conexao, $sql); //executa uma consulta no banco

        header("location: index.php");

    break;

    case "editar":

        $id = $_POST["id"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE tbl_categoria SET descricao = '$descricao'  WHERE id = $id"; //sempre deixar com aspas simples no sql
        
        $resultado = mysqli_query($conexao, $sql);
        
        header("location: index.php");
    
    break;


    default:
        # code...
        break;
}
