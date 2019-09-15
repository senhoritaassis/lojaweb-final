<?php

require_once "modelo/produtoModelo.php";
require_once "modelo/categoriaModelo.php";
require_once "servico/uploadServico.php";
require_once "servico/validacaoServico.php";

function buscar() {
    if (ehPost()) {
        $nome = $_POST["buscar"];
        $dados = [];
        $dados["produtos"] = BuscarProdutoPorNome($nome);
        exibir("produto/listar", $dados);
    }
}

function adicionar() {
    if (ehPost()) {
        $nomeproduto = $_POST["nomeproduto"];
        $tipo = $_POST["tipo"];
        $preco = $_POST["preco"];
        $cor = $_POST["cor"];
        $fabricante = $_POST["fabricante"];
        $descricao = $_POST["descricao"];
        $tamanho = $_POST["tamanho"];

        $nome_tmp_imagem = $_FILES["imagem"]["tmp_name"]; # vai pegar o nome temporário do arquivo da imagem
        $nome_imagem = $_FILES["imagem"]["name"]; # vai pegar o nome real do arquivo da imagem
        $imagem = uploadImagem($nome_tmp_imagem, $nome_imagem);

        $categoria = $_POST["idcategoria"];
        $quantidade = $_POST["quantidade"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];


        //validação do campo nome
        if (strlen(trim($nomeproduto)) == 0) {
            //caso nao esteja preenchido, verifiar nome válido
            $errors[] = "Você deve inserir um nome do produto.";
        }

        //validação do campo tipo
        if (strlen(trim($tipo)) == 0) {
            //caso nao esteja preenchido, verifiar tipo válido
            $errors[] = "Você deve inserir um tipo";
        }

        //validação do campo preco
        if (strlen(trim($preco)) == 0) {
            //caso nao esteja preenchido, verifiar preco válido
            $errors[] = "Você deve inserir um preco.";
        } else {
            //if (filter_var($preco, FILTER_VALIDATE_INT) == false){
            //caso preco seja invalido, adicionar o array
            //$errors[] = "Inserir um preco válido.";
            //}
        }

        //validação do campo cor
        if (strlen(trim($cor)) == 0) {
            //caso nao esteja preenchido, verifiar cor válido
            $errors[] = "Você deve inserir um cor";
        }

        //validação do campo fabricante
        if (strlen(trim($fabricante)) == 0) {
            //caso nao esteja preenchido, verifiar fabricante válido
            $errors[] = "Você deve inserir um fabricante";
        }

        //validação do campo descricao
        if (strlen(trim($descricao)) == 0) {
            //caso nao esteja preenchido, verifiar descricao válido
            $errors[] = "Você deve inserir um descricao";
        }

        //validação do campo tamanho
        if (strlen(trim($tamanho)) == 0) {
            //caso nao esteja preenchido, verifiar tamanho válido
            $errors[] = "Você deve inserir um tamanho";
        }
        //validação do campo imagem
        if (strlen(trim($imagem)) == 0) {
            //caso nao esteja preenchido, verifiar imagem válido
            $errors[] = "Você deve inserir um imagem";
        }
        //validação do campo categoria
        if (strlen(trim($categoria)) == 0) {
            //caso nao esteja preenchido, verifiar categoria válido
            $errors[] = "Você deve inserir um categoria";
        }

        //validação do campo quantidade
        if (strlen(trim($quantidade)) == 0) {
            //caso nao esteja preenchido, verifiar quantidade válido
            $errors[] = "Você deve inserir um quantidade";
        } else {
            if (filter_var($quantidade, FILTER_VALIDATE_INT) == false) {
                //caso preco seja invalido, adicionar o array
                $errors[] = "Inserir um quantidade válido.";
            }
        }

        //validação do campo estoque_minimo
        if (strlen(trim($estoque_minimo)) == 0) {
            //caso nao esteja preenchido, verifiar estoque_minimo válido
            $errors[] = "Você deve inserir um estoque_minimo";
        }

        //validação do campo estoque_maximo
        if (strlen(trim($estoque_maximo)) == 0) {
            //caso nao esteja preenchido, verifiar estoque_maximo válido
            $errors[] = "Você deve inserir um estoque_maximo";
        }

        //verificar se existem erros antes de adicionar no banco
        $dados = array();
        if (count($errors) > 0) {
            $dados["errors"] = $errors;
        } else {
            //chamar a função do modelo para salvar no banco de dados 
            $msg = adicionarProduto($nomeproduto, $tipo, $preco, $cor, $fabricante, $descricao, $tamanho, $imagem, $categoria, $quantidade, $estoque_minimo, $estoque_maximo);
            echo $msg;
            redirecionar("./produto/listarProdutos");
        }
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produto/formulario", $dados);
    } else {
        //aqui não existem dados submetidos!
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produto/formulario", $dados);
    }
}

function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}

function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["produto"] = pegarProdutoPorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("produto/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarProduto($id);
    redirecionar("produto/listarProdutos");
}

function editar($id) {
    //verifica se a página foi submetida
    if (ehPost()) {
        //pega os dados do formulário
        $nomeproduto = $_POST["nomeproduto"];
        $tipo = $_POST["tipo"];
        $preco = $_POST["preco"];
        $cor = $_POST["cor"];
        $fabricante = $_POST["fabricante"];
        $descricao = $_POST["descricao"];
        $tamanho = $_POST["tamanho"];

        $imagem_temp_name = $_FILES["imagem"]["tmp_name"]; # vai pegar o nome temporário do arquivo da imagem
        $name_imagem = $_FILES["imagem"]["name"]; # vai pegar o nome real do arquivo da imagem
        $imagem = uploadImagem($nome_tmp_imagem, $nome_imagem);

        $categoria = $_POST["idcategoria"];
        $quantidade = $_POST["quantidade"];
        $estoque_minimo = $_POST["estoque_minimo"];
        $estoque_maximo = $_POST["estoque_maximo"];
        //chama o editarProduto do produtoModelo
        editarProduto($id, $nomeproduto, $tipo, $preco, $cor, $fabricante, $descricao, $tamanho, $imagem, $categoria, $quantidade, $estoque_minimo, $estoque_maximo);
        redirecionar("produto/listarProdutos");
    } else {
        //busca os dados do produto que será alterado
        $dados["produto"] = pegarProdutoPorId($id);
        $dados["categorias"] = pegarTodasCategorias();
        exibir("produto/formulario", $dados);
    }
}
