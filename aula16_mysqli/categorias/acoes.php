<?php

//CONEXÃO COM BANCO DE DADOS
require_once("../database/conexao.php");

/*TRATAMENTO DOS DADOS VINDOS DO FORMULARIO

- tipos da ação
- execuçãop dos processos da ação solicitada

*/

switch ($_POST["acao"]) {
    case 'inserir':
        // echo "INSERIR"; exit;

        $descricao = $_POST["descricao"];

        //mostagem da instrução sql de inserção de dados
        //*devemos cercar a variavel com aspas simples
        //*tudo o que ela não souber interpretar ele vai mandar como string(se tudo fo com aspas simples)

        $sql = "INSERT INTO tbl_categoria (descricao) VALUES ('$descricao')";

        /* mysql_query parametros:
        1 - Uma conexão aberta e válida
        2 - Uma instrução sql válida
        */

        $resultado = mysqli_query($conecao, $sql); //executa uma consulta no banco

        header("location: index.php");
        

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";exit;
        break;
    
    default:
        # code...
        break;
}
