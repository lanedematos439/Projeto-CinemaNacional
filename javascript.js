const barraPesquisa = document.querySelector("#barraPesquisa");
let dados = [];

// Carrega o JSON
async function carregarJSON() {
    const resposta = await fetch("data-detalhe.json");
    dados = await resposta.json();
}

// Função que roda ao buscar
async function IniciarBusca() {
    const termo = barraPesquisa.value.toLowerCase().trim();

    // Se vazio, limpa e não redireciona
    if (termo === "") {
        return;
    }

    // Garante que o JSON foi carregado
    if (dados.length === 0) {
        await carregarJSON();
    }

    // Filtra os dados (por nome ou resumo)
    const filtrados = dados.filter(d =>
        d.nome.toLowerCase().includes(termo) ||
        d.resumo.toLowerCase().includes(termo)  // Ajuste para 'descricao' se for o campo no JSON
    );

    // Salva os filtrados e o termo no localStorage
    localStorage.setItem('resultadosBusca', JSON.stringify(filtrados));
    localStorage.setItem('termoBusca', termo);

    // Redireciona para a página de resultados
    window.location.href = "lista-resultados.php";
}

// Evento para Enter
barraPesquisa.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        IniciarBusca();
    }
});