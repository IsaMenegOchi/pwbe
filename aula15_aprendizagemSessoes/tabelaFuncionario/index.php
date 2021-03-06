<?php

require("../logins/funcoesSessao.php");


session_start();

verificarLogin();

    $funcionarios = lerArquivo("./dados/empresaX.json");


    if(isset($_GET["buscarFuncionario"]) && $_GET["buscarFuncionario"] !=""){
        $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
    }
   

    // else if(isset($_POST["cadastrarFuncionario"]) && isset($_POST["idFuncionario"]) && isset($_POST["nomeFuncionario"]) 
    // && isset($_POST["sobrenomeFuncionario"]) && isset($_POST["emailFuncionario"]) && isset($_POST["generoFuncionario"])
    // && isset($_POST["enderecoIpFuncionario"]) && isset($_POST["paisFuncionario"]) && isset($_POST["departamentoFuncionario"]))
    
    // else if(isset($_POST["departamentoFuncionario"]))
    // {
    //     $listaFunc = cadastrarFuncionario(
    //         $funcionarios,
           
    //         $first_name = $_POST["nomeFuncionario"],
    //         $last_name = $_POST["sobrenomeFuncionario"],
    //         $email = $_POST["emailFuncionario"],
    //         $gender = $_POST["generoFuncionario"],
    //         $ip_address = $_POST["enderecoIpFuncionario"],
    //         $country= $_POST["paisFuncionario"],
    //         $department= $_POST["departamentoFuncionario"]
    //     );

    //   escrevendoJson("empresaX.json", $listaFunc);
    // }

    // else if(isset($_POST["deletarFuncionario"])){
    //     deletandoFuncionario(
    //         $funcionarios, 
    //         $id = $funcionarios->id
    //     );
    // }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./style/style.css">
    <script src="./script/script.js" defer></script>
    
    <title>Atividade Principal</title>
</head>
<body>
    <section>
        <h1>EmpresaX</h1>
        <div class="boasVindas">
            <h2>
                <?php echo 'Ol?? ' . ucfirst($_SESSION['usuario']) . ' - Login efetutado em: ' 
                .$_SESSION['data_hora'];?>
            </h2> 
            <h2>
            <a class="material-icons" href="../logins/processa_login.php?logout=true">logout</a>
            </h2>
        </div>
       
        <div id="containerAcoes">
            <form id="buscarFunc" method="GET">
                    <input type="text" name="buscarFuncionario" id="buscarFuncionario" value="<?=isset($_GET["buscarFuncionario"])? $_GET["buscarFuncionario"] : ""?>"  placeholder="Digite o nome">
                    <button><i class="material-icons">search</i></button>
            </form>
            <button onclick="showCadastro()" class="cadastrar" id="cadastrar">Cadastrar</button>
        </div>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Endere??o IP</th>
                <th>Pa??s</th>
                <th>Departamento</th>
                <th>Modificar</th>
            </tr>
            <?php
                foreach($funcionarios as $funcionario):
            ?>
                <tr>
                    <td name="idFunc"><?= $funcionario->id?></td>
                    <td><?= $funcionario->first_name?></td>
                    <td><?= $funcionario->last_name?></td>
                    <td><?= $funcionario->email?></td>
                    <td><?= $funcionario->gender?></td>
                    <td><?= $funcionario->ip_address?></td>
                    <td><?= $funcionario->country?></td>
                    <td><?= $funcionario->department?></td>
                    <td>
                        <button onclick="editar(<?= $funcionario->id ?>)" class="material-icons">edit</button>
                        <button onclick="deletar(<?= $funcionario->id ?>)" class="material-icons">person_remove</button>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </section>
    <div class="container-form-cadastro">
        <form method="POST" action="acoes.php">
            <div>
                <label for="">Digite o Id Do funcion??rio</label>
                <input type="number" name="idFuncionario"  id="idFuncionario" placeholder="id">
            </div>
            <div>
                <label for="">Digite o Nome do funcion??rio</label>
                <input type="text" name="nomeFuncionario" id="nomeFuncionario" placeholder="nome">
            </div>
            <div>
                <label for="">Digite sobrenome do funcion??rio</label>
                <input type="text" name="sobrenomeFuncionario" id="sobrenomeFuncionario" placeholder="sobrenome">
            </div>
            <div>
                <label for="">Digite o e-mail do funcion??rio</label>
                <input type="text" name="emailFuncionario"  id="emailFuncionario" placeholder="e-mail">
            </div>
            <div>
                <label for="">Digite o g??nero do funcion??rio</label>
                <input type="text" name="generoFuncionario" id="generoFuncionario" placeholder="g??nero">
            </div>
            <div>
                <label for="">Digite o endere??o IP do funcion??rio</label>
                <input type="text" name="enderecoIpFuncionario"  id="enderecoIpFuncionario" placeholder="endere??o IP">
            </div>
            <div>
                <label for="">Digite o pa??s do funcion??rio</label>
                <input type="text" name="paisFuncionario" id="paisFuncionario" placeholder="digite o pa??s">
            </div>
            <div>
                <label for="">Digite o departamento do funcion??rio</label>
                <input type="text" name="departamentoFuncionario" id="departamentoFuncionario" placeholder="departamento">
            </div>

            <button>Cadastrar</button>
        </form>
    </div>
</body>
</html>