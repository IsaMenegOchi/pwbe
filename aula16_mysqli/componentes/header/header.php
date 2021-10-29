<?php

session_start();


$raiz = "/isabelle/aulaspwbe/aula16_mysqli";

// if(isset($_POST["senha"]) && isset($_POST["usuario"])){
//     $usuarioInserido = $_POST["usuario"];
//     $sqlUsuario = "SELECT usuario FROM tbl_administrador";
//     $usuarioBD = mysqli_query($conexao, $sqlUsuario);
    
//     $senhaInserida = $_POST["senha"];
//     $sqlSenha = "SELECT senha FROM tbl_administrador";
//     $senhaBD = mysqli_query($conexao, $sqlSenha);

//     $respostaSenha = mysqli_fetch_array($senhaBD);
//     $respostaUsuario = mysqli_fetch_array($usuarioBD);

// $teste = realizarLogin($usuarioInserido, $senhaInserida, $respostaUsuario, $respostaSenha);

// echo "<pre>";
// var_dump($teste);
//         echo "</pre>";
//  }


?>


<link href="<?= $raiz?>/componentes/header/header.css" rel="stylesheet" />

<header class="header">

    <figure>
        <a href="<?= $raiz?>/produtos">
            <img src="<?= $raiz?>/imgs/logo.png" />
        </a>
    </figure>
    
    <?php
    if (!isset($_SESSION["usuarioId"])) {
    ?>
        <nav>
            <ul>
                <a id="menu-admin">Administrar</a>
            </ul>
        </nav>
        <div id="container-login" class="container-login">
            <h1>Fazer Login</h1>
            <form method="POST" action="<?= $raiz?>/componentes/header/acoesLogin.php">
                <input type="hidden" name="acao" value="login" />
                <input type="text" name="usuario" placeholder="Usuário" />
                <input type="password" name="senha" placeholder="Senha" />
                <button>Entrar</button>
            </form>
        </div>
    <?php
    } else {
    ?>
        <nav>
            <ul>
                <a id="menu-admin" onclick="logout()">Sair</a>
            </ul>
        </nav>
        <form id="form-logout" style="display:none" method="POST" action="<?= $raiz ?>/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="logout" />
        </form>
    <?php
    }
    ?>
   
</header>

<script lang="javascript">
    document.querySelector("#menu-admin").addEventListener("click", toggleLogin);

    function logout() {
        document.querySelector("#form-logout").submit();
    }

    function toggleLogin() {
        let containerLogin = document.querySelector("#container-login");
        let h1Form = document.querySelector("#container-login > h1");
        let form = document.querySelector("#container-login > form");
        //se estiver oculto, mostra 
        if (containerLogin.style.opacity == 0) {
            h1Form.style.display = "block";
            form.style.display = "flex";
            containerLogin.style.opacity = 1;
            containerLogin.style.height = "200px";
            //se n�o, oculta
        } else {
            h1Form.style.display = "none";
            form.style.display = "none";
            containerLogin.style.opacity = 0;
            containerLogin.style.height = "0px";
        }
    }

</script>

