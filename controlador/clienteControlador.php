<?php

require_once "modelo/clienteModelo.php";
require_once "modelo/enderecoModelo.php";

function adicionar() {
    if(ehPost()) {
        //aqui os dados foram submetidos!
      
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $sexo = $_POST["sexo"];
        $telefone = $_POST["telefone"];
        //aqui vai as suas validações dos campos acima
        
        //validação do campo email
  if (strlen(trim($email)) == 0) {
      //caso nao esteja preenchido, verifiar email válido
         $errors[] = "Voc� deve inserir um e-mail.";
  } else {
  if (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      //caso email seja invalido, adicionar o array
      $errors[] = "Inserir um e-mail valido.";
    }
  }
  
  //validação do campo senha
  if (strlen(trim($senha)) == 0) {
      //caso nao esteja preenchido, verifiar a senha válida
         $errors[] = "Voc� deve inserir uma senha.";
  } 
  
        //validação do campo cpf
  if (strlen(trim($cpf)) == 0) {
      //caso nao esteja preenchido, verifiar cpf válido
         $errors[] = "Voce deve inserir um cpf.";
  } 
        //validação do campo nome
  if (strlen(trim($nome)) == 0) {
      //caso nao esteja preenchido, verifiar nome válido
         $errors[] = "Voce deve inserir um nome.";
  } 
  
        //validação do campo nascimento
  if (strlen(trim($nascimento)) == 0) {
      //caso nao esteja preenchido, verifiar nascimento válido
         $errors[] = "Voce deve inserir uma data de nascimento.";
  } 
  
        //validação do campo sexo
  if (strlen(trim($sexo)) == 0) {
      //caso nao esteja preenchido, verifiar sexo válido
         $errors[] = "Voce deve inserir um sexo.";
  } 
  
  //validação do campo telefone
  if (strlen(trim($telefone)) == 0) {
      //caso nao esteja preenchido, verifiar telefone válido
         $errors[] = "Voce deve inserir um telefone.";
  } else {
  if (filter_var($telefone, FILTER_VALIDATE_INT) == false){
      //caso cpf seja invalido, adicionar o array
      $errors[] = "Inserir um telefone valido.";
    }
  }
  
  //verificar se existem erros antes de adicionar no banco
  if (count($errors) > 0){
      $dados = array();
      $dados["errors"] = $errors;
      exibir("cliente/formulario", $dados);
  } else {
     //chamar a função do modelo para salvar no banco de dados
     $msg = adicionarCliente($email, $senha, $cpf, $nome, $nascimento, $sexo, $telefone);
        echo $msg;
        redirecionar("./cliente/listarClientes"); 
  }
    }else {
        //aqui não existem dados submetidos!
         exibir("cliente/formulario");
    }
   
}




function listarClientes() {
    $dados = array();
    $dados["clientes"] = pegarTodosClientes();
    exibir("cliente/listar", $dados);
}

function ver($idCliente){
    $dados ["cliente"] = pegarClientePorId($idCliente);
    $dados ["enderecos"] = pegarEnderecosPorUsuario($idCliente);
    exibir ("cliente/visualizar", $dados);
}


function deletar($id) {
    $msg = deletarCliente($id);
    redirecionar("cliente/listarClientes");
    
}

function editar($id) {
    //verifica se a página foi submetida
    if (ehPost()) {
        //pega os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $nascimento = $_POST["nascimento"];
        $sexo = $_POST["sexo"];
        $telefone = $_POST["telefone"];
        //chama o editarCliente do clienteModelo
        editarCliente($id, $nome, $email, $senha, $nascimento, $sexo, $telefone);
        redirecionar("cliente/listarClientes");
    } else {
        //busca os dados do cliente que será alterado
        $dados["cliente"] = pegarClientePorId($id);
        exibir("cliente/formulario", $dados);
    }
}

function adiciona($idUsuario) {
    if (ehPost()) {       
        $logradouro = strip_tags($_POST ["logradouro"]);
        $numero =  strip_tags($_POST ["numero"]);
        $complemento =  strip_tags($_POST ["complemento"]);
        $bairro =  strip_tags($_POST ["bairro"]);
        $cidade =  strip_tags($_POST ["cidade"]);
        $cep =  strip_tags($_POST ["cep"]);
        $errors = array();
    }
}
