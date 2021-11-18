<?php

require_once("./conection.php");

//*FUNÇÃO DE LEITURA DE DADOS (Sem criterio)
function read($conection){
    $sql = "SELECT * FROM tbl_pessoa";

    if ($result = mysqli_query($conection, $sql)) {
        $datas = mysqli_fetch_all($result); //fetch_all - Obtem todas as linhas de resultado como uma matriz associativa, uma matriz numerica ou ambos    
        echo json_encode(array("status"=>"success", "data"=>$datas));
    } 
    else {
        echo json_encode(array("error"=>"error", "data"=>mysqli_error($conection)));
    }
}

//*FUNÇÃO DE LEITURA DE DADOS (com criterio)

function readID($cod_pessoa, $conection){

    $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    if ($result = mysqli_query($conection, $sql)) {
        $dados = mysqli_fetch_all($result);
        echo json_encode(array("status" => "success", "data"=>$dados));
    }
    else{
        echo json_encode(array("error"=>"error", "data"=>mysqli_error($conection)));
    }
}

function create($nome, $sobrenome, $email, $celular, $fotografia, $conection){
    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$fotografia')";

    if (mysqli_query($conection, $sql)) {

        //sempre precimos dar uma resposta quando hé uma requisição
        echo json_encode(array("status" => "success", "data"=>"Dados inseridos com sucesso"));
    }
    else {
        echo json_encode(array("status" => "error", "data"=>"Erro ao inserrir os dados"));
    }
}

function update($cod_pessoa, $nome, $sobrenome, $email, $celular, $fotografia, $conection){
    $sql = "UPDATE tbl_pessoa SET 
        nome = '$nome', 
        sobrenome = '$sobrenome', 
        email = '$email', 
        celular = '$celular', 
        fotografia = '$fotografia' 
        WHERE cod_pessoa = $cod_pessoa";

    if (mysqli_query($conection, $sql)) {

        //sempre precimos dar uma resposta quando hé uma requisição
        echo json_encode(array("status" => "success", "data"=>"Dados alterados com sucesso"));
    }
    else {
        echo json_encode(array("status" => "error", "data"=>mysqli_error($conection)));
    }
}

function delete($cod_pessoa, $conection){

    $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    if (mysqli_query($conection, $sql)) {

        //sempre precimos dar uma resposta quando hé uma requisição
        echo json_encode(array("status" => "success", "data"=>"Dados apagados com sucesso"));
    }
    else {
        echo json_encode(array("status" => "error", "data"=>mysqli_error($conection)));
    }
}


?>