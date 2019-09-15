
<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

        <th>ID</th>
        <th>DESCRIÇÃO</th>
        </tr>        
    </thead>
    <?php foreach ($categorias as $categoria): ?>
        <tr>
            
            <td><?= $categoria['idCategoria'] ?></td>
            <td><?= $categoria['descricao'] ?></td>
            <td><a href="./categoria/ver/<?=$categoria['idCategoria']?>">Ver</a></td>
            <td><a href="./categoria/editar/<?=$categoria['idCategoria']?>">Alterar</a></td>
            <td><a href="./categoria/deletar/<?=$categoria['idCategoria']?>">Deletar</a></td>
</tr>
    <?php endforeach; ?>
</table>


<a href="./categoria/adicionar" class="btn btn-primary">Nova categoria</a>
