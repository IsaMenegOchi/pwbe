<?php 

session_start();

//
require_once("../database/conexao.php");


function validarCampos(){

    //Array das mensagens de erro
    $erros = [];

    //*VALIDAÇÃO DA DESCRIÇÃO
        if(!isset($_POST["descricao"]) || $_POST["descricao"] == null){

            $erros[] = "O campo descrição é obrigatório";

        }

    //*VALIDAÇÃO DO PESO
        if(!isset($_POST["peso"]) || $_POST["peso"] == ""){
            $erros[] = "O campo peso é obrigatório";
        }

        else if(!is_numeric(str_replace(",", ".", $_POST["peso"]))){
            $erros[] = "O campo peso deve ser um número";  
        }

    //*VALIDAÇÃO DA QUANTIDADE
        if(!isset($_POST["quantidade"]) || $_POST["quantidade"] == ""){
            $erros[] = "O campo quantidade é obrigatório";
        }

        else if(!is_numeric(str_replace(",", ".", $_POST["quantidade"]))){
            $erros[] = "O campo quantidade deve ser um número";  
        }
    
    //*VALIDAÃO DE COR
        if(!isset($_POST["cor"]) || $_POST["cor"] == ""){

            $erros[] = "O campo cor é obrigatório";
        }

    //*VALIDAÇÃO DE VALOR
        if(!isset($_POST["valor"]) || $_POST["valor"] == ""){

            $erros[] = "O campo valor é obrigatório";

        }

        else if(!is_numeric(str_replace(",", ".", $_POST["valor"]))){
            $erros[] = "O campo valor deve ser um número";  
        }
    
    //*VALIDAÇÃO DO DESCONTO
        if(!isset($_POST["desconto"]) || $_POST["desconto"] == ""){

            $erros[] = "O campo desconto é obrigatório";

        }
        else if(!is_numeric(str_replace(",", ".", $_POST["desconto"]))){
            $erros[] = "O campo desconto deve ser um número";  
        }
    //*VALIDAÇÃO DE TAMANHO
        if(!isset($_POST["tamanho"]) || $_POST["tamanho"] == ""){

            $erros[] = "O campo tamanho é obrigatório";

        }
    
    //*VALIDAÇÃO DA CATEGORIA
        if(!isset($_POST["categoria"]) || $_POST["categoria"] == ""){

            $erros[] = "O campo categoria é obrigatório";

        }

    //*VALIDAÇÃO DA IMAGEM
        if ($_FILES["foto"]["error"] == UPLOAD_ERR_NO_FILE) {
            $erros[] = "O precisa enviar um arquivo de imagem";
        }
        else{
            $imagensInfo = getimagesize($_FILES["foto"]["tmp"]);

            //forma de representar 2MB
            if ($_FILES["foto"]["size"] > 1024 * 1024 * 2) {
               $erros[] = "O arquivo não pode ser maior que 2MB";
            }

            $width = $imagensInfo[0];
            $heigth = $imagensInfo[1];

            if ($width != $heigth) {
                $erros[] = "A imagem precisa ser quadrada";
            }
        }

        return $erros;
}


switch ($_POST["acao"]) {
    case 'inserir':

       // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        // exit;

        foreach ($_POST as $key => $value) {
            
            echo "INDICE-> " . $key . ' VALR-> ' . $value . '<br>'; 

            if ($_POST["$key"] == "" || !isset($_POST["$key"])) {
                
            }

        }

        $erros = validarCampos();

        if (count($erros) > 0) {
           $_SESSION["erros"] = $erros;

           header("location: novo/index.php");
           exit;
        }
        
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

    case 'deletar':

        $idProduto = $_POST["produtoId"];

        // $selecionarImagem = "SELECT imagem FROM tbl_produto WHERE id = $idProduto";
        
        $comandoDeletarImagem = "SELECT imagem FROM tbl_produto WHERE id = $idProduto";
        $comandoSql = "DELETE FROM tbl_produto WHERE id = $idProduto";

        
        $nomeImagem = mysqli_query($conexao, $comandoDeletarImagem);
        $produto = mysqli_fetch_array($nomeImagem);

        $resultado = mysqli_query($conexao, $comandoSql);
        unlink("./fotos/$produto[imagem]");
        
        header("location: ./index.php");

    break;

    case 'editar':

        $id = $_POST["produtoId"];
        
        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $quantidade = $_POST["quantidade"];
        $cor = $_POST["cor"];
        $tamanho = $_POST["tamanho"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];
        $categoriaId = $_POST["categoria"];

        $sql = "UPDATE tbl_produto SET descricao = '$descricao', peso = '$peso', quantidade = '$quantidade',
        cor = '$cor', tamanho = '$tamanho', valor = '$valor', desconto = '$desconto', categoria_id = '$categoriaId'
        WHERE id = $id"; //sempre deixar com aspas simples no sql
        
        
        $resultado = mysqli_query($conexao, $sql);
        // echo "<pre>";
        // var_dump($sql);
        // echo "</pre>"; exit;

        header("location: ../");

    break;

        

    default:
         # code...
    break;
 }

?>