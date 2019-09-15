<meta charset="utf-8">
<h2>Listar Produtos Carrinho</h2>
<table class="table">
    <thead>
        <tr>
            <TH>idProduto</TH>
            <th>NOME</th> 
            <th>PREÇO</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <?php 
    if(isset($carrinho)) {
        $total=0;
        // $total=0;
        // $defiDesconto=0;
        foreach ($carrinho as $produto){ 
    ?>

    <tr>                         
            <td><?= $carrinho['idProduto'] ?></td>
            <td><?= $carrinho['nome'] ?></td>
            <td><?= $carrinho['preco'] ?></td>
            <?= $total=$total + $produto['preco'];?>
            <td><a href="./carrinho/deletar/<?=$produto['idProduto']?>"class="btn btn-danger">Deletar</a></td>
            <td><a href="./carrinho/comprar/<?=$produto['idProduto']?>"class="btn btn-danger">Comprar</a></td>
        </tr>
    <?php 
        }
    }else{
        echo "<h1>Seu carrinho está vazio<h1>";
    }
    ?>
</table>
    <br><br>

<form action="./carrinho/adicionarCupom/<?=$total?>"  method="POST">
    
    <div class="form-group">
        <label for="desconto">Cupom</label>
        <input id="desconto" class="form-control" type="text" name="desconto">
    </div>

    <button type="submit">Oi</button>

</form>

   <?php
   // $total = $total- $defiDesconto;
   if (isset($carrinho)) {
            echo "O Total da sua compra em reais é: ". $total;
            $pedido["PrecoTotal"]=$total;
            echo "O Total e da sua compra com desconto é de: ". $totalcompra;
    ?>
    <a href="./pedido/comprar/<?=$pedido['PrecoTotal']?>" class="btn btn-danger">Comprar</a>
<?php  
}
    ?>        