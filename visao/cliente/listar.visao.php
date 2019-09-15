
<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

        <th>ID</th> 
        
        <th>EMAIL</th>
        
        <th>SENHA</th>
        
        <th>NOME</th>
        
        <th>DATA DE NASCIMENTO</th>
        
        <th>SEXO</th>
        
        <th>TELEFONE</th>
        </tr>        
    </thead>
    <?PHP foreach ($clientes as $cliente): ?>
        <tr>

            <td><?= $cliente['idCliente'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['senha'] ?></td>
            <td><?= $cliente['nome'] ?></td>
            <td><?= $cliente['nascimento'] ?></td>
            <td><?= $cliente['sexo'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
            <td><a href="./cliente/ver/<?=$cliente['idCliente']?>">Ver</a></td>
            <td><a href="./cliente/editar/<?=$cliente['idCliente']?>">Alterar</a></td>
            <td><a href="./cliente/deletar/<?=$cliente['idCliente']?>">Deletar</a></td>
</tr>
    <?php endforeach; ?>
</table>

<a href="./cliente/adicionar" class="btn btn-primary">Novo cliente</a>





