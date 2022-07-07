//TENTATIVA de paginação por SÉRIE
async function listarSerie(serie) {
	const dadoserie = await fetch("./listar_series.php?serie=" + serie);
	const respostaserie = await dadoserie.json();
	// console.log(respostaserie);
	if (!respostaserie['statuserie']) {
		document.getElementById("msgAlertSerie").innerHTML = respostaserie['msgserie'];
	} else {
		const conteudoserie = document.querySelector(".listar_series");
		if (conteudoserie) {
			conteudoserie.innerHTML = respostaserie['dadoserie'];
		}
	}
}
listarSerie(1);