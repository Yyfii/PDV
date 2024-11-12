window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')){
        alert("Produto deletado com sucesso!")
    }
};

document.getElementById('enable').onclick = function() {
    const elementos = document.querySelectorAll('.itens-form input[disabled], .itens-form select[disabled]');
    elementos.forEach(elemento => {
        elemento.removeAttribute('disabled');
    });
}


function openConfirmation(id) {
    document.getElementById("confirmationPopup").style.display = "flex";
}

function closeConfirmation() {
    document.getElementById("confirmationPopup").style.display = "none";
}

/*function checkalert(id){
    sts = confirm('Você tem certeza que deseja deletar esse fornecedor? Deletar um fornecedor apagará todos os produtos relacionados a ele.')
    if(sts){
      document.location.href='../model/fornecedor/delete.php?id='+id;  
    }
}
    function confirmDelete(id) {
    //document.location.href='../model/fornecedor/delete.php?id='+id;  
}*/

