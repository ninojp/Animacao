//Script de paginação por especial
async function listarespecial(especial) {
	const dadoespecial = await fetch("./listar_especiais.php?especial=" + especial);
	const respostaespecial = await dadoespecial.json();
	if (!respostaespecial['statuespecial']) {
		document.getElementById("msgAlertespeciais").innerHTML = respostaespecial['msgespecial'];
	} else {
		const conteudoespecial = document.querySelector(".listar_especiais");
		if (conteudoespecial) {
			conteudoespecial.innerHTML = respostaespecial['dadoespecial'];
		}
	}
}
listarespecial(1);