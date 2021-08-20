<?php 

    // declarando um vetor
    $cargos = [
        "Gerente de produtos",
        "Gerente de projetos",
        "Fesenvolvedor Front End",
        "Desenvolvedor Back end",
    ];
    // $cargos = array(); - forma antiga

    

// adicionando um elemento no vetor
    $cargos[] = "DevOps";
    $cargos[] = "QA";
    $cargos[] = "Analista de sistemas";

    // podemos colocar um nome dentro do array $cargos["cargão"] = "devOps";
    //a diferenlça entre colocar aq em cima, é que aq puxa do banco de dados


// imprimindo um vetor

    // print_r($cargos);
    // die;

    //excluindo um vetor
    //unset($cargos[2]) - para excluir mais de um, devemmos criar um para cada

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">

    <title>Fintech Fullbank</title>
</head>
<body>
    <form method="POST" action="fullbank.php">

        <h1>Fullbank</h1>

        <label>Nome completo:</label>
        <input type="text" name="nome" id="" required>

        <label>Salário atual:</label>
        <input type="number" name="salario" id="" required>

        <label>Gênero:</label>
        <div>
            <!-- precisamos sempre adcionar um value para que apareça na network no required  -->
            <span>
                <input type="radio" name="genero" id="generoF" value="f" required>
                <label for="generoF">F</label>
            </span>
                
            <span>
                <input type="radio" name="genero" id="generoM" value="m" required>
                <label for="generoM">M</label>
            </span>
                
            <span>
                <input type="radio" name="genero" id="generoO" value="o" required>
                <label for="generoO">Outro</label>
            </span>

        </div>
        
        <label>Cargo:</label>
        <select name="cargo" id="selecaoDeCargo" required>
            
            <option value="" >Selecione sua profissão</option>
                <!-- o value="" deixa ser selecionado mas devolve algo vazio, assim o fomulartio pede para selecionar
                Já com o disable ele não deixa se selcionado e pede para preencher o campo -->
            <!-- <option value="RH">RH</option>
            <option value="Financeiro">Financeiro</option>
            <option value="BD">BD</option>
            <option value="Administração">Administração</option>
            <option value="Economista">Economista</option>
            <option value="TI">TI</option>
            <option value="Marketing">Marketing</option>
            <option value="Logística">Logística</option> -->

            <?php
            $tam = count($cargos);
            $contador = 0;


            while($contador < $tam){
                echo "<option>" . $cargos[$contador] . "</option>";
                $contador++;
            }
            // foreach($cargos as $cargo){ //colocamos o array como variavel
            //     echo "<option>$cargo</option>";
            // }
            ?>

        </select>

        <button>Calcular</button>
    </form>
</body>
</html>