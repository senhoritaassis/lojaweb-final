
<h2>Listar Cupons</h2>

<table class="table">
    <thead>
        <tr>  
            
        <th>ID</th>
        
        <th>DESCONTO</th> 
        
        <th>DESCRIÇÃO</th>
        
        
        
        </tr>        
    </thead>
    <?php foreach ($cupons as $cupom): ?>
    
        <tr>

            <td><?= $cupom['idCupom'] ?></td>
            <td><?= $cupom['descricao'] ?></td>
            <td><?= $cupom['desconto'] ?></td>
            <td><a href="./cupom/ver/<?=$cupom['idCupom']?>">Ver</a></td>
            <td><a href="./cupom/editar/<?=$cupom['idCupom']?>">Alterar</a></td>
            <td><a href="./cupom/deletar/<?=$cupom['idCupom']?>">Deletar</a></td>
            
</tr>
    <?php endforeach; ?>
</table>


<a href="./cupom/adicionar" class="btn btn-primary">Novo cupom</a>



