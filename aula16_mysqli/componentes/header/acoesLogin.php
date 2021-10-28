<?php

require_once("../../database/conexao.php");

//! Codigo do prof
// function realizarLogin ($usuario, $senha, $conexao){

//     $resultado = mysqli_query($conexao, $sql);

//     $dadosUsuario = mysqli_fetch_array($resultado);

//     if(isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"])){

//     }
// }




// function verificarLogin(){
        //     if($_SESSION['id'] != session_id() || (empty($_SESSION['id']))){
        //         header("location: ./index.php");
        //     }
        // }


if($_POST["acao"] == "login") {

        $usuarioInserido = $_POST["usuario"];
        $sqlUsuario = "SELECT usuario FROM tbl_administrador";
        $usuarioBD = mysqli_query($conexao, $sqlUsuario);
            
        $senhaInserida = $_POST["senha"];
        $sqlSenha = "SELECT senha FROM tbl_administrador";
        $senhaBD = mysqli_query($conexao, $sqlSenha);
        
        $respostaSenha = mysqli_fetch_array($senhaBD);
        $respostaUsuario = mysqli_fetch_array($usuarioBD);


        function realizarLogin($usuarioInserido, $senhaInserida, $usuarioBD,  $senhaBD){
        
            if ($usuarioBD == $usuarioInserido && $senhaInserida == $senhaBD ) {
                header("location: ../../produtos/index.php");
                exit;
            }
        
            else if($usuarioBD !== $usuarioInserido && $senhaInserida == $senhaBD ){
                echo "Seu usuario está incorreto!";
            }
        
            else if ($usuarioBD == $usuarioInserido && $senhaInserida !== $senhaBD ){
                echo "Sua senha está incorreta!";
            }
            else{
                echo "Seu usuário e senha esta incorreto!";
            }
        }
        // echo "<pre>";
        // var_dump($respostaSenha);
        // var_dump($respostaUsuario);
        // var_dump($usuarioInserido);
        // var_dump($senhaInserida);
        // echo "</pre>";
}