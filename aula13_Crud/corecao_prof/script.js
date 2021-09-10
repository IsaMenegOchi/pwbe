
function showModal(){
    document.querySelector(".modal-form").style.display = "flex";
}

function deletar(idFuncionario){
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se confirmar que quer apagar, redireciona para arquivo de ação
    //com o id como parâmetro
    if(confirmacao){
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

document.getElementById("btnAddFuncionario")
    .addEventListener("click", showModal);