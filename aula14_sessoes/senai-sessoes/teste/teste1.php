<?php 

//CRIANDO SESSÃO:

    //cria uma session / precisa ser o primeiro codigo da pagina
    session_start();
    
    //verificando id de sessão (recupera o id do session start)
    echo session_id();

//CRIANDO VARAIVEIS DE SESSÃO
    //Nome da minha variavel
    $_SESSION["nome"] = "ISABELLE MENEGON OCHINI";

    //quando o teste1 sair, essa variavel morre
    // $nome = "ISABELLE MENEGON OCHINI";
