
const listarCatProdutos = async (pagina) => {
    const dados = await fetch("./list-categorias.php?pagina="+ pagina);
    const resposta =await dados.json();
    console.log(resposta)
}


listarCatProdutos(1);