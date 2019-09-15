<?php

function adicionarFormaPagamento ($descricao){
    $sql = "INSERT INTO FormaPagamento (descricao) VALUES ('$descricao')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar FormaPagamento' . mysqli_error($cnx)); }
    return 'FormaPagamento cadastrado com sucesso!';
}

function pegarTodasFormaPagamentos() {
    $sql = "SELECT * FROM FormaPagamento";
    $resultado = mysqli_query(conn(), $sql);
    $FormaPagamento = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $FormaPagamento[] = $linha;
    }
    return $FormaPagamento;
}
function pegarFormaPagamentoPorId($id){
    //buscar um única Forma de Pagamento pelo $id
    $sql = "SELECT * FROM FormaPagamento WHERE idFormaPagamento= '$id'";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $FormaPagamento
    $FormaPagamento = mysqli_fetch_assoc($resultado);
    //retorna a $FormaPagamento
    return $FormaPagamento;
}

function deletarFormaPagamento($id) {
    $sql = "DELETE FROM FormaPagamento WHERE idFormaPagamento = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar FormaPagamento' . mysqli_error($cnx));
    }
    
    return 'Forma de Pagamento deletado com sucesso!';
}
function editarFormaPagamento($id, $descricao) {
    $sql = "UPDATE FormaPagamento SET descricao = '$descricao' WHERE idFormaPagamento = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar FormaPagamento' . mysqli_error($cnx));
    }
    return 'Forma de Pagamento alterado com sucesso!';
}


