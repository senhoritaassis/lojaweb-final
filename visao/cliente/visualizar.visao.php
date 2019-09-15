<h2> Ver detalhes do cliente </h2>
<a href="./endereco/adicionar/<?=$cliente['idCliente']?>"> Endereço </a>
<p>Id Usuário: <?=$cliente ['idCliente']?> </p>
<p>Nome: <?=$cliente ['nome']?> </p>
<p>Email: <?=$cliente ['email']?> </p>
<p>Senha: <?=$cliente ['senha']?> </p>
<p>CPF: <?=$cliente ['cpf']?> </p>
<p>Data de Nascimento: <?=$cliente ['nascimento']?> </p>
<p>Sexo: <?=$cliente ['sexo']?> </p>
<p>Telefone: <?=$cliente ['telefone']?> </p>


<?php
require_once 'visao/endereco/listar.visao.php';
?>
