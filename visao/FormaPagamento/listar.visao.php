
<h2>Listar Forma de Pagemento</h2>

<table class="table">
    <thead>
        <tr>  
            
        <th>ID</th>
             
        <th>DESCRIÇÃO</th>
        
        
        
        </tr>        
    </thead>
    <?php foreach ($FormaPagamentos as $FormaPagamento): ?>
    
        <tr>

                <td><?= $FormaPagamento['idFormaPagamento'] ?></td>
            <td><?= $FormaPagamento['descricao'] ?></td>
            <td><a href="./FormaPagamento/ver/<?=$FormaPagamento['idFormaPagamento']?>">Ver</a></td>
            <td><a href="./FormaPagamento/editar/<?=$FormaPagamento['idFormaPagamento']?>">Alterar</a></td>
            <td><a href="./FormaPagamento/deletar/<?=$FormaPagamento['idFormaPagamento']?>">Deletar</a></td>
            
</tr>
    <?php endforeach; ?>
</table>


<a href="./FormaPagamento/adicionar" class="btn btn-primary">Nova Forma de Pagemento</a>
