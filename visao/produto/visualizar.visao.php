<img src="<?= $produto['imagem'] ?>">

<h2> Ver detalhes do produto</h2>
<p>Id: <?= $produto['idProduto'] ?></p>
<p>Preco: <?= $produto['preco'] ?></p>
<p>Nome: <?= $produto['nomeProduto'] ?></p>
<p>Tipo: <?= $produto['tipo'] ?></p>
<p>Cor: <?= $produto['cor'] ?></p>
<p>Fabricante: <?= $produto['fabricante'] ?></p>
<p>Descricao: <?= $produto['descricao'] ?></p>
<p>Tamanho: <?= $produto['tamanho'] ?></p>
<p>Categoria: <?= $produto['idCategoria'] ?></p>
<p>Quantidade: <?= $produto['quantidade'] ?></p>
<p>Estoque Minimo: <?= $produto['estoque_minimo'] ?></p>
<p>Estoque Maximo: <?= $produto['estoque_maximo'] ?></p>
<a href="./produto/adicionar" class="btn btn-primary">Novo produto</a>
