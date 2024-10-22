document.getElementById('enable').addEventListener('click', function() {
    // Seleciona todos os elementos desabilitados no formulário
    const elementos = document.getElementsByClassName('disabled');
    
    // Converte a coleção de elementos em um array e remove o atributo 'disabled' de cada elemento
    Array.from(elementos).forEach(elemento => {
        elemento.removeAttribute('disabled');
    });
});
