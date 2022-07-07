const listarCatAnimacao = async (pagina) => {
  const dados = await fetch("./list-categorias.php?pagina=" + pagina);
  const resposta = await dados.json();

  if (resposta['erro']) {
    document.getElementById("msgAlertaCat").innerHTML = resposta['msg'];
  } else {
    document.querySelector(".listar-cat-animacao").innerHTML = resposta['dados'];
  }
}
listarCatAnimacao(1);
//Função para Liatar as Animações de cada categoria
async function listarAnimacao(pagina, id_cat){
    console.log("Página: " + pagina + ". id da Categoria: " + id_cat);
    const dadosAni = await fetch('listar_animacao.php?pagina=' + pagina + "&id_cat=" + id_cat);
    const respostaAni = await dadosAni.json();
  if (respostaAni['erro']) {
    document.getElementById("msgAlertaCat").innerHTML = respostaAni['msg'];
  } else {
    //document.getElementById("msgAlertaCat").innerHTML = respostaAni['msg'];

    const listAnimesModal = new bootstrap.Modal(document.getElementById("listAnimesModal"));
    listAnimesModal.show();
    document.querySelector(".lista_anime").innerHTML = respostaAni['dados'];
  }
}
//Função para PAGINAÇÃO do Listar as Animes de cada categoria
async function listarAnimacaoPag(pagina, id_cat){
  const dadosAni = await fetch('listar_animacao.php?pagina=' + pagina + "&id_cat=" + id_cat);
  const respostaAni = await dadosAni.json();
if (respostaAni['erro']) {
  document.getElementById("msgErroAnime").innerHTML = respostaAni['msg'];
} else {
  document.querySelector(".lista_anime").innerHTML = respostaAni['dados'];
}
}