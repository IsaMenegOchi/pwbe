<?php

//RECUPERANDO A SEÇÃO CRIADA
    //essa função cria e recupera (essa sessão exciste? não. Então criar. a sess]ao existe? sim. Recuperar)
    session_start();
    
    //impremi o id da sessão
    echo session_id();

//EXBINDO NOME VARIAVEL DA SESSÃO
    echo "<br><br>" . $_SESSION["nome"];