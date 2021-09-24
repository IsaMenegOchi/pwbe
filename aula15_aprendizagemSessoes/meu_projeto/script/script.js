function showCadastro(){
    document.querySelector(".container-form-cadastro").style.display = "flex";
    // document.getElementById("nomeAluno").value = nomeAluno
}

//FUNÇÃO DELETAR FUNCIONARIO:
function deletar(idFuncionario){
    
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se confirmar que quer apagar, redireciona para arquivo de ação
    //com o id como parâmetro
    if(confirmacao){
        window.location = "./acaoDeletar.php?id=" + idFuncionario;
    }
}

//FUNÇÃO EDITAR FUNCIONARIO
function editar(idFuncionario){
    //o windows location é como se escrevesse na url
    window.location = "./editarF.php?id=" + idFuncionario;
}

document.getElementById("cadastrar")
.addEventListener("click", showCadastro);