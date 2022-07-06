// JavaScript Document Criado em 18/05/2022
// foi modificado do original adicionado o FUNCTION antes da palavra LISTARANIMES
async function listarAnimes(pagina) {
	const dados = await fetch("./listar.php?pagina=" + pagina);
	const resposta = await dados.json();
	// console.log(resposta);
	if (!resposta['status']) {
		document.getElementById("msgAlerta").innerHTML = resposta['msg'];
	} else {
		const conteudo = document.querySelector(".listar-animes");
		if (conteudo) {
			conteudo.innerHTML = resposta['dados'];
		}
	}
}
listarAnimes(1);
