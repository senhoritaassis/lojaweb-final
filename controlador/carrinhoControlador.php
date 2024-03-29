<?php

require "./modelo/produtoModelo.php";
require "./modelo/cupomModelo.php";

function index() {
    if (isset($_SESSION["carrinho"])) {
        //pega e manda produto por id
        $produtosCarrinhoId = array();
        foreach ($_SESSION["carrinho"] as $produtoID) {
            $produtosCarrinhoId[] = pegarProdutoPorId($produtoID["idproduto"]);
        }
        $dados["produtos"] = $produtosCarrinhoId;
        //pega e manda quantidade de produtos
        $produtosCarrinhoQuant = array();
        foreach ($_SESSION["carrinho"] as $produtoQuant) {
            $produtosCarrinhoQuant[] = $produtoQuant["quantidade"];
        }
        $dados["quant"] = $produtosCarrinhoQuant;
        exibir("carrinho/visualizar", $dados);
    } else {
        exibir("carrinho/vazio");
    }
}

function excluir($id) {
    //print_r($_SESSION["carrinho"]);
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]["idproduto"] == $id) {
            unset($_SESSION["carrinho"][$i]);
        }
    }
    $_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
    //redirecionar("carrinho");
    if (empty($_SESSION["carrinho"])) {
        unset($_SESSION["carrinho"]);
        redirecionar("carrinho/index");
    }
}

function excluirTudo($id) {
    unset($_SESSION["carrinho"]);
    redirecionar("carrinho/index");
}

function adicionar($id) {
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = array();
    }
    //vai existir a sessao carrinho!
    $alt = false;
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]["idproduto"] == $id) {
            $alt = true;
            $_SESSION["carrinho"][$i]["quantidade"] ++;
        }
    }
    if (!$alt) {
        $produto["idproduto"] = $id;
        $produto["quantidade"] = 1;
        $_SESSION["carrinho"][] = $produto;
    }
    redirecionar("carrinho/index");
}

function calPreco($preco, $quant) {
    return $preco * $quant;
}

function minOne($id) {
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]["idproduto"] == $id) {
            if ($_SESSION["carrinho"][$i]["quantidade"] > 1) {
                $_SESSION["carrinho"][$i]["quantidade"] --;
            } else {
                excluir($id);
            }
        }
    }
    redirecionar("carrinho/index");
}

function sumOne($id) {
    //$quant = pegarQuantProdutoPorId($id);
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]["idproduto"] == $id) {
            //if ($_SESSION["carrinho"][$i]["quantidade"] < $quant["Unidades"]) {
                $_SESSION["carrinho"][$i]["quantidade"] ++;
            //}
        }
    }
    redirecionar("carrinho/index");
}

?>