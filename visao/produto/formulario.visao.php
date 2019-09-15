<?php
if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>


<form action="" method="POST" enctype="multipart/form-data">

    <label>Nome:</label><input type="text" name="nomeproduto" value="<?= @$produto['nomeProduto'] ?>"><br><br>
    <label>Tipo de Produto:</label><input type="text" name="tipo" value="<?= @$produto['tipo'] ?>"<br><br>
    <label>Preço:</label><input type="text" name="preco" value="<?= @$produto['preco'] ?>"><br><br>
    <label>Cor:</label><input type="text" name="cor" value="<?= @$produto['cor'] ?>"><br><br>
    <label>Fabricante:</label><input type="text" name="fabricante" value="<?= @$produto['fabricante'] ?>"><br><br>
    <label>Descrição:</label><input type="text" name="descricao" value="<?= @$produto['descricao'] ?>"><br><br>
    <label>Tamanho:</label><input type="text" name="tamanho" value="<?= @$produto['tamanho'] ?>"><br><br>
    <label>Imagem:</label><input type="file" name="imagem"><br><br>
    <label>Categoria:</label><select name="idcategoria">
        <option value=""></option> 
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria["idCategoria"] ?>"><?= @$categoria["descricao"] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label>Estoque Minimo:</label><input type="text" name="estoque_minimo" value="<?= @$produto['estoque_minimo'] ?>"><br><br>
    <label>Estoque Maximo:</label><input type="text" name="estoque_maximo" value="<?= @$produto['estoque_maximo'] ?>"><br><br>
    <label>Quantidade:</label><input type="text" name="quantidade" value="<?= @$produto['quantidade'] ?>"><br><br>

    <button type="submit">Cadastrar</button>     

</form>