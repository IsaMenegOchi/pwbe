<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./dados/empresaX.json");

if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
  $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles-global.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="./script.js" defer></script>
  <title>Empresa X</title>
</head>

<body>
  <div class="content">
    <h1>Funcionários da empresa X</h1>
    <p style="text-align: center">
      A empresa conta com <em> <?= count($funcionarios) ?> </em> funcionários.
    </p>
    <form method="GET" class="search-form">
      <div class="input-group" style="flex: 1">
        <label>Pesquisar por nome</label>
        <input type="search" placeholder="Digite o nome" name="filtro" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />
      </div>
      <button class="material-icons">
        person_search
      </button>
    </form>
    <button id="btnAddFuncionario">Adicionar Funcionário</button>
    <br /><br />
    <div class="modal-form">
      <form id="form-funcionario" action="acoes.php" method="POST">
        <h1>Adicionar funcionário</h1>
        <input type="text" placeholder="Digite o id" name="id" />
        <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
        <input type="text" placeholder="Digite o sobrenome" name="last_name" />
        <input type="text" placeholder="Digite o e-mail" name="email" />
        <input type="text" placeholder="Digite o sexo" name="gender" />
        <input type="text" placeholder="Digite o IP" name="ip_address" />
        <input type="text" placeholder="Digite o país" name="country" />
        <input type="text" placeholder="Digite o departamento" name="department" />
        <button>Salvar</button>
      </form>
    </div>
    <table>
      <tr>
        <th>
          ID
        </th>
        <th>
          Nome
        </th>
        <th>
          Sobrenome
        </th>
        <th>
          E-mail
        </th>
        <th>
          Sexo
        </th>
        <th>
          Endereço IP
        </th>
        <th>
          País
        </th>
        <th>
          Departamento
        </th>
      </tr>
      <?php
      foreach ($funcionarios as $funcionario) :
      ?>
        <tr>
          <td>
            <?= $funcionario->id ?>
          </td>
          <td>
            <?= $funcionario->first_name ?>
          </td>
          <td>
            <?= $funcionario->last_name ?>
          </td>
          <td>
            <?= $funcionario->email ?>
          </td>
          <td>
            <?= $funcionario->gender ?>
          </td>
          <td>
            <?= $funcionario->ip_address ?>
          </td>
          <td>
            <?= $funcionario->country ?>
          </td>
          <td>
            <?= $funcionario->department ?>
          </td>
        </tr>
      <?php
      endforeach;
      ?>
    </table>
  </div>
</body>

</html>