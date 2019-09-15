<center>
    <h2>Carrinho</h2>
    <br><br>
    <table border="1">
        <tr>
            <td>Nome Produto</td>
            <td>Preço Unidade</td>
            <td>Quantidade</td>
            <td>Valor Produtos</td>
            <td>Adicionar/Remover</td>
            <td>Excluir</td>
        </tr>
            <?php $soma= 0;$i = 0; foreach ($produtos as $produto): ?>
                <tr>
                    <td><a href="./produto/visualizar/<?=$produto['idProduto']?>" class="btn btn-secondary"><?= $produto["nomeproduto"] ?></a></td>
                    <td><?= $preco=$produto["preco"] ?></td>
                    <td><?= $quanti=$quant[$i++] ?></td>
                    <td><?=calPreco($preco,$quanti)?></td>
                    <?php
                    $soma= $soma+calPreco($preco,$quanti);                    
                    ?>
                    <td><a href="./carrinho/sumOne/<?= $produto['idProduto'] ?>">+  </a><a href="./carrinho/minOne/<?= $produto['idProduto'] ?>">   -</a></td>
                    <td><a href="./carrinho/excluir/<?= $produto['idProduto'] ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <br><br> 
        <a>Valor Total: <?=$soma?></a>
    <br><br><br>   
    <?php
        $_SESSION["valorTotal"] = $soma;
    ?>
<a href="./carrinho/excluirTudo">Limpar Carrinho</a>
<a href="./compra/">Comprar</a>	
</center>