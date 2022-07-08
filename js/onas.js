//Script de paginação por ona
async function listarona(ona) {
	const dadoona = await fetch("./listar_onas.php?ona=" + ona);
	const respostaona = await dadoona.json();
	if (!respostaona['statuona']) {
		document.getElementById("msgAlertonas").innerHTML = respostaona['msgona'];
	} else {
		const conteudoona = document.querySelector(".listar_onas");
		if (conteudoona) {
			conteudoona.innerHTML = respostaona['dadoona'];
		}
	}
}
listarona(1);