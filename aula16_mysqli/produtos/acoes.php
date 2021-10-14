<?php 

//
require_once("../database/conexao.php");


switch ($_POST["acao"]) {
    case 'inserir':
        
        //*SALVAMENTO DA IMAGEM
        
            //Recupera o nome do arquivo
            //? Essa super global (FILES) pega todas as infos do arquivo
            $nomeArquivo = $_FILES["foto"]["name"];


            //Recuperar a extenção do arquivo
            //?Retorna a informação do arquivo
            $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

            //definir um novo nome para o arquivo de imagem
            //?md5 = calcula o hash de um md5 (como se fosse uma criptografia)
            //?microtime = devolve um timestamp
            //?timestamp = coverte um tempo em micro-segundos (podemos guardar como se fosse um codigo e pegar futuramemten em um aplicação)
            //essa aplicação faz com que no momento/data e hora em que o usuario da enter, ele transforma o nome da imagem em um numero 
            $novoNomeArquivo = md5(microtime()) . "." . $extensao;

            //upload do arquivo para pasta fotos
            //?Não altera a qualidade da imagem, apesar de fazer uma cópia
            move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNomeArquivo");


        header("location: ../index.php");

        //*TRATAMENTO DE IMAGEM

            //Recebimento dos dados
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $quantidade = $_POST["quantidade"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $valor = $_POST["valor"];
            $desconto = $_POST["desconto"];
            $categoriaId = $_POST["categoria"];

            
            //Criação da intrução sql de inserção
            //?Campos numericos não precisam estar com aspas
            $instrucaoSqlInsercao = "INSERT INTO tbl_produto (descricao, peso, quantidade, cor, tamanho, valor, desconto, imagem, categoria_id) 
                VALUES('$descricao', $peso, $quantidade, '$cor', '$tamanho', $valor, $desconto, '$novoNomeArquivo', $categoriaId)";

            //Execução do sql inserção

            $resultadoInsercao = mysqli_query($conexao, $instrucaoSqlInsercao);

            header("location: ../index.php");

    break;

    default:
         # code...
    break;
 }

?>