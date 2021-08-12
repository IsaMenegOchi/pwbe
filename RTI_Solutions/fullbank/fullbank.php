<?php



    if (isset($_POST["nome"]) && isset($_POST["salario"])
        && isset($_POST["genero"]) && isset($_POST["cargo"])){
     
        $nome = $_POST["nome"];
        $salario = $_POST["salario"];
        $genero = $_POST["genero"];
        $cargo = $_POST["cargo"];
    
        $novoSalario = 0;
     

        if ($salario <= 5000) {
            $novoSalario = 20 * $salario/100;
        }
        else {
            $novoSalario = 20 * $salario/100;

        }
        echo "$novoSalario";
    }
    else {
        echo "Você não preencheu corretamente os campos";
    }

?>