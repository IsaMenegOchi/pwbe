<?php

    require_once("./Connection.php");
    require_once("./model/ModelPessoa.php");

    //representa uma connecion de php
    $conn = new Connection();

    $modelPessoa = new ModelPessoa($conn->returnConnection());

    $dados = $modelPessoa->findAll();
    echo "<pre>";
    var_dump($dados);
    echo "</pre>";


?>