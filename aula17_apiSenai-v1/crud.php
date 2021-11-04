<?php

require_once("./conection.php");

//*FUNÇÃO DE LEITURA DE DADOS
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


function create($nome, $sobrenome, $email, $celular, $fotografia, $conection){
    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular, fotografia) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$fotografia')";

    if (mysqli_query($conection, $sql)) {
        echo json_encode(array("status" => "success", "data"=>"Dados inseridos com sucesso"));
    }
    else {
        echo json_encode(array("status" => "error", "data"=>"Erro ao inserrir os dados"));
    }
}




?>