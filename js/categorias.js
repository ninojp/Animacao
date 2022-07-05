const listarCatAnimacao = async (pagina) => {
  const dados = await fetch("./list-categorias.php?pagina=" + pagina);
//   const dados = await fetch("./list-categorias.php");
  const resposta = await dados.json();
  if(resposta['erro']){
    document.getElementById("msgAlertaCat").innerHTML = resposta['msg'];
  }else{
    document.querySelector(".listar-cat-animacao").innerHTML = resposta['dados'];
  }
}
listarCatAnimacao(1);

async function listarAnimacao(pagina, id_cat){
    console.log("Página:" +pagina+ ".Id da Categoria:"+id_cat);
    const dadosAni = await fetch('listar_animacao.php?pagina=' + pagina + "&id_cat" + id_cat);
}