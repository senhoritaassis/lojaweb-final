<?php

function adicionarProduto ($nomeProduto, $tipo, $preco, $cor, $fabricante, $descricao, $tamanho, $imagem, $categoria, $quantidade, $estoque_minimo, $estoque_maximo){
    $sql = "INSERT INTO produto (nomeProduto, tipo, preco, cor, fabricante, descricao, tamanho, imagem, idcategoria, quantidade, estoque_minimo, estoque_maximo) VALUES ('$nomeProduto', '$tipo', '$preco', '$cor', '$fabricante', '$descricao', '$tamanho', '$imagem', '$categoria', '$quantidade', '$estoque_minimo', '$estoque_maximo')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    return 'Produto cadastrado com sucesso!';
}

function pegarTodosProdutos() {
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
}

function BuscarProdutoPorNome($nome) {
    $sql = "SELECT * FROM produto WHERE nomeProduto LIKE '%$nome%'";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
}
function pegarProdutoPorId($id){
    //buscar um único produto pelo $id
    $sql = "SELECT * FROM produto WHERE idProduto= '$id'";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $produto
    $produto = mysqli_fetch_assoc($resultado);
    //retorna o $produto
    return $produto;
}

function deletarProduto($id) {
    $sql = "DELETE FROM produto WHERE idProduto = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar produto' . mysqli_error($cnx));
    }
    
    return 'Produto deletado com sucesso!';
}

function editarProduto($id, $nomeProduto, $tipo, $preco, $cor, $fabricante, $descricao, $tamanho, $imagem, $categoria, $quantidade, $estoque_minimo, $estoque_maximo) {
    $sql = "UPDATE produto SET nomeProduto = '$nomeProduto', tipo = '$tipo', preco = '$preco', cor = '$cor', fabricante = '$fabricante', descricao = '$descricao', tamanho = '$tamanho', imagem = '$imagem', idcategoria = '$categoria', quantidade = '$quantidade', estoque_minimo = '$estoque_minimo', estoque_maximo = '$estoque_maximo' WHERE idProduto = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar produto' . mysqli_error($cnx));
    }
    return 'Produto alterado com sucesso!';
}


