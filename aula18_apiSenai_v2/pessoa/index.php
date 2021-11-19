<?php
//reuni conexão, model e controller
    //qualquer requisição http ele entra aqui 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Content-Type: applicatiopn/json");

    require_once("../Connection.php");
    require_once("../controller/ControllerPessoa.php");
    require_once("../model/ModelPessoa.php");

    $conn = new Connection;
    $modelPessoa = new ModelPessoa($conn->returnConnection());
    $controller = new ControllerPessoa($modelPessoa);

    $dados = $controller->router();

    echo json_encode(array("status"=>"sucess", "data"=>$dados));



?>