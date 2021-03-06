<?php
session_start();

//Conexão com o banco 
require_once("../../database/conexao.php");

//Query sql - O que vamos escrever na tabela
$sql = "SELECT * FROM tbl_categoria";

//Executar a uery sql na base de dados
$resultado = mysqli_query($conexao, $sql)

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../styles-global.css" />
  <link rel="stylesheet" href="./novo.css" />
  <title>Administrar Produtos</title>

</head>

<body>

<?php include('../../componentes/header/header.php'); ?>

  <div class="content">

    <section class="produtos-container">

      <main>

      <!-- enctype = apenas utilizado com o metodo post/necessario para fazer o upload de arquivos em formularios -->
        <form class="form-produto" method="POST" action="../acoes.php" enctype="multipart/form-data"> 


          <input type="hidden" name="acao" value="inserir" />

          <h1>Cadastro de produto</h1>

          <ul>

            <?php
            if (isset($_SESSION["erros"])) {
              
              foreach ($_SESSION["erros"] as $erros) {
                echo "<li> $erros </li>";
              }
              unset($_SESSION["erros"]);
        
            }
            ?>

          </ul>

          <div class="input-group span2">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao">
          </div>

          <div class="input-group">
            <label for="peso">Peso</label>
            <input type="text" name="peso" id="peso">
          </div>

          <div class="input-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade" id="quantidade">
          </div>

          <div class="input-group">
            <label for="cor">Cor</label>
            <input type="text" name="cor" id="cor">
          </div>

          <div class="input-group">
            <label for="tamanho">Tamanho</label>
            <input type="text" name="tamanho" id="tamanho">
          </div>

          <div class="input-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor">
          </div>

          <div class="input-group">
            <label for="desconto">Desconto</label>
            <input type="text" name="desconto" id="desconto">
          </div>

          <div class="input-group">

            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" >
              <option value="">SELECIONE</option>
              
              <!-- LISTAGEM DE CATEGORIAS VINDAS DO BANCO -->

              <?php 
              
                //resultado possui todos os dados da tabela categoria, e o fetch array faz com que essa tabela o tranforme em array
                while ($categoria = mysqli_fetch_array($resultado)){
              ?>
                <option value="<?= $categoria['id']?>"> <?= ucfirst($categoria["descricao"])?></option>

            <?php } ?>
              
            </select>

          </div>

          <div class="input-group">
            <label for="categoria">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" />
          </div>

          <button onclick="javascript:window.location.href = '../'">Cancelar</button>
          <button>Salvar</button>

        </form>

      </main>

    </section>
  </div>

  <footer>
    SENAI 2021 - Todos os direitos reservados
  </footer>
  
</body>

</html>