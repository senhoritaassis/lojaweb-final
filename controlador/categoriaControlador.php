<?php

require_once "modelo/categoriaModelo.php";
require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        //aqui os dados foram submetidos!

        $descricao = $_POST["descricao"];
        //aqui vai as suas validações dos campos acima    
        
       //validação do campo descricao
        if (strlen(trim($descricao)) == 0) {
            //caso nao esteja preenchido, verifiar descricao válido
               $errors[] = "Você deve inserir um descricao";
        }
        $msg = adicionarCategoria($descricao);
        //echo $msg;
        redirecionar("./categoria/listarCategorias");
    } else {
        //aqui não existem dados submetidos!
    }
    exibir("categoria/formulario");
}


function listarCategorias() {
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}


function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["categoria"] = pegarCategoriaPorId($id);
    //chama o arquivo: visao/categoria/visualizar.visao.php
    exibir("categoria/visualizar", $dados);
}
 

function deletar($id) {
    $msg = deletarCategoria($id);
    redirecionar("categoria/listarCategorias");
    
}

function editar($id) {
    //verifica se a página foi submetida
    if (ehPost()) {
        //pega os dados do formulário
        $descricao = $_POST["descricao"];
      
        //chama o editarCliente do clienteModelo
        editarCategoria($id, $descricao);
        redirecionar("categoria/listarCategorias");
    } else {
        //busca os dados do cliente que será alterado
        $dados["categoria"] = pegarCategoriaPorId($id);
        exibir("categoria/formulario", $dados);
    }
}

