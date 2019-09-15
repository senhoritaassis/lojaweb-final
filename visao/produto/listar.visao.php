<h2>Listar Produtos</h2>

<table class="table">
    <thead>
        <tr>  
            
        <th>ID</th>
        
        <th>NOME</th>
        
        <th>TIPO</th>
        
        <th>PRECO</th>
        
        <th>COR</th>
        
        <th>FABRICANTE</th>
        
        <th>DESCRIÇÃO</th>
        
        <th>TAMANHO</th>
        
        <th>IMAGEM</th>
        
        <th>CATEGORIA</th>
        
        <th>QUANTIDADE</th>
        
        <th>ESTOQUE MINIMO</th>
        
        <th>ESTOQUE MAXIMO</th>
        
        </tr>        
    </thead>
    <?php foreach ($produtos as $produto): ?>
    
        <tr>

            <td><?= $produto['idProduto'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= $produto['nomeProduto'] ?></td>
            <td><?= $produto['tipo'] ?></td>
            <td><?= $produto['cor'] ?></td>
            <td><?= $produto['fabricante'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['tamanho'] ?></td>
            <td><img src="<?= $produto['imagem'] ?>" alt="<?=$produto['idProduto']?>"></td>
            <td><?= $produto['idCategoria'] ?></td>
            <td><?= $produto['quantidade'] ?></td>
            <td><?= $produto['estoque_minimo'] ?></td>
            <td><?= $produto['estoque_maximo'] ?></td>
            <td><a href="./produto/ver/<?=$produto['idProduto']?>">Ver</a></td>
            <td><a href="./produto/editar/<?=$produto['idProduto']?>">Alterar</a></td>
            <td><a href="./produto/deletar/<?=$produto['idProduto']?>">Deletar</a></td>
            <td><a href="./carrinho/adicionar/<?=$produto['idProduto']?>">Comprar</a></td>
            
</tr>
    <?php endforeach; ?>
</table>


<a href="./produto/adicionar" class="btn btn-primary">Novo produto</a>



