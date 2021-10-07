<?php 

//
require_once("../database/conexao.php");


switch ($_POST["acao"]) {
    case 'inserir':
        
        //tratamento da imagem para upload
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        
        //recupera o nome do arquivo
        //? Essa super global pega todas as infos do arquivo
        $nomeArquivo = $_FILES["foto"]["name"];


        //recuperar a extenção do arquivo
        //?Retorna a informação do arquivo
        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        //definir um novo nome para o arquivo de imagem
        //?md5 = calcula o hash de um md5 (como se fosse uma criptografia)
        //?microtime = 
        //?timestamp = coverte um tempo em micro-segundos (podemos guardar como se fosse um codigo e pegar futuramemten em um aplicação)
        //essa aplicação faz com que no momento/data e hora em que o usuario da enter, ele transforma o nome da imagem em um numero 
        $novoNomeArquivo = md5(microtime()) . "." . $extensao;

        //upload do arquivo para pasta fotos
        move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/$novoNomeArquivo");


        header("location: ../index.php");
     
    default:
         # code...
    break;
 }

?>