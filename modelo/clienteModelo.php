<?php

function adicionarCliente ($email, $senha, $cpf, $nome, $nascimento, $sexo, $telefone){
    $sql = "INSERT INTO cliente (email, senha, cpf, nome, nascimento, sexo, telefone) VALUES ('$email', '$senha', '$cpf', '$nome', '$nascimento', '$sexo', '$telefone')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar cliente' . mysqli_error($cnx)); }
    return 'Cliente cadastrado com sucesso!';
}

function pegarTodosClientes() {
    $sql = "SELECT * FROM cliente";
    $resultado = mysqli_query(conn(), $sql);
    $clientes = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $clientes[] = $linha;
    }
    return $clientes;
}

function pegarClientePorId($id){
    //buscar um único cliente pelo $id
    $sql = "SELECT * FROM cliente WHERE idCliente= $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cliente
    $cliente = mysqli_fetch_assoc($resultado);
    //retorna o $cliente
    return $cliente;
}

function deletarCliente($id) {
    $sql = "DELETE FROM cliente WHERE idCliente = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar cliente' . mysqli_error($cnx));
    }
    
    return 'Cliente deletado com sucesso!';
}

function editarCliente($id, $nome, $email, $senha, $nascimento, $sexo, $telefone) {
    $sql = "UPDATE cliente SET nome = '$nome', email = '$email', senha = '$senha', nascimento = '$nascimento', sexo = '$sexo', telefone = '$telefone' WHERE idCliente = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cliente' . mysqli_error($cnx));
    }
    return 'Cliente alterado com sucesso!';
}