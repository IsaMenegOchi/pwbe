<?php

// tipagem fraca e dinamica, não precisamos definir as variaveis
// conforme a atribuição, o php define o tipo
    //inferencia automatica
// string - aspas e aspas simples 
/* * Há possibilidade de mudança na atribuição
 *Sempre que começar com $_ são variaveis pré definidas, que são globais e podem ser acessadas em todo a programação


*/ 


$cidade = "Jandira";

echo "Aqui a cidade é do tipo: " . gettype($cidade); //retorna o tipo da variavel
