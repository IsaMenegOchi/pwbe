<?php

function fecharNota(array &$turma){
    foreach ($turma as $chave => $aluno){
        if ($aluno["nota"] >= 50) {
            $turma[$chave]["situacao"] = "Aprovado";
        }
        else {
            $turma[$chave]["situacao"] = "Reprovado";
        } 
    }
}