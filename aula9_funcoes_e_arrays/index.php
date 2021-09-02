<?php 

//funções que inclui outro arquivo
// include("aluno.php");
 //caso o arquivo não existir, ele ainda vai rodar, porem com avisos
 require("aluno.php");
 //caso o arquivo não existir, ele quebra a página/ é como um include obrigatório
 //require_once/include_once - possui as mesmas propriedades anteriores, porem, ele não deixa que coloquemos os mesmos arquivos duas vezes

//importar o arquivo de funções (cria-lo)
//Chamar a função de "fechar notas"
//pintar a celula do aprovardo de verde, e de reprovado vermelho

require("funcoes.php");

fecharNota($alunos);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    
    <title>Nota dos Alunos</title>
</head>
<body>
    <section>
    <h1>Tabela de notas</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nota</th>
            <th>Situação</th>
        </tr>

        <?php 
        foreach($alunos as $aluno){
        ?>
        <tr>
            <td><?= $aluno["nome"]?></td>
            <td><?= $aluno["idade"]?></td>
            <td><?= $aluno["nota"]?></td>
            <td class = "<?= strtolower($aluno['situacao'])?>"><?=$aluno["situacao"]?></td>
            <!-- PROF - caso as clases no css seja aprov e reprov-->
            <td class="<?= $aluno["situacao"] == "Aprovado" ? "aprov" : "reprov" ?>"><?=$aluno["situacao"]?></td>
            <td class="
            <?php
            if ($aluno["situacao"] == "Aprovado"){
                echo "aprov";
            }
            else{
                echo "reprov";
            }
            ?>"> <?=$aluno["situacao"]?></td>

        </tr>   
        <?php 
        }
        ?>
        
    
    </table>
    </section>
</body>
</html>