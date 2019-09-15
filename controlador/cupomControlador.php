<?php

require_once "modelo/cupomModelo.php";

function adicionar() {
     if(ehPost()) {
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        $errors = array();
        //validação do campo descricao
         if (strlen(trim($descricao)) == 0) {
        //caso nao esteja preenchido, verifiar descricao válido
           $errors[] = "Você deve inserir uma descricao.";
        } 
        //validação do campo desconto
         if (strlen(trim($desconto)) == 0) {
            //caso nao esteja preenchido, verifiar desconto válido
            $errors[] = "Você deve inserir uma desconto.";
        } else {
            if (filter_var($desconto, FILTER_VALIDATE_INT) == false){
                //caso desconto seja invalido, adicionar o array
                $errors[] = "Inserir um desconto válido.";
            }
        }
        //verificar se existem erros antes de adicionar no banco
        $dados = array();
        if (count($errors) > 0){     
           $dados["errors"] = $errors;
           exibir("cupom/formulario",$dados);
           

        } else {
             //chamar a função do modelo para salvar no banco de dados 
            $msg = adicionarCupom($descricao, $desconto);
            redirecionar("cupom/listarCupons");
         }
    } else {
        //aqui não existem dados submetidos!
      
        exibir("cupom/formulario");
    }
}

function listarCupons() {
    $dados = array();
    $dados["cupons"] = pegarTodosCupom();
    exibir("cupom/listar", $dados);
}

function ver($id) {
//passa o $id para o a função pegarCupomPorId do modelo
$dados["cupom"] = pegarCupomPorId($id);
//chama o arquivo: visao/cupom/visualizar.visao.php
exibir("cupom/visualizar", $dados);
}

function deletar($id) {
$msg = deletarCupom($id);
redirecionar("cupom/listarCupons");
}

function editar ($id) {
    if (ehPost()) {
        
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        editarCupom($id, $descricao, $desconto);
        redirecionar("cupom/listarCupons");
    } else {
        //aqui não existem dados submetidos!
        exibir("cupom/formulario");
    }
}
