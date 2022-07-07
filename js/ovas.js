//Script de paginação por OVA
async function listarova(ova) {
	const dadoova = await fetch("./listar_ovas.php?ova=" + ova);
	const respostaova = await dadoova.json();
	if (!respostaova['statuova']) {
		document.getElementById("msgAlertovas").innerHTML = respostaova['msgova'];
	} else {
		const conteudoova = document.querySelector(".listar_ovas");
		if (conteudoova) {
			conteudoova.innerHTML = respostaova['dadoova'];
		}
	}
}
listarova(1);