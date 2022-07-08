//Script de paginação por Filme
async function listarfilme(filme) {
	const dadofilme = await fetch("./listar_filmes.php?filme=" + filme);
	const respostafilme = await dadofilme.json();
	if (!respostafilme['statufilme']) {
		document.getElementById("msgAlertFilmes").innerHTML = respostafilme['msgfilme'];
	} else {
		const conteudofilme = document.querySelector(".listar_filmes");
		if (conteudofilme) {
			conteudofilme.innerHTML = respostafilme['dadofilme'];
		}
	}
}
listarfilme(1);