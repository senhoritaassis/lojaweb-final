<?php

require_once 'modelo/produtoModelo.php';
/* CONTROLADOR
 * funçao: controlar as páginas estáticas (páginas sem acesso ao modelo)  */

function index() {
    $dados =[];
    $dados['produtos'] = pegarTodosProdutos();
    exibir("paginas/inicial",$dados);
}

function sobre(){
	exibir("paginas/sobre");
}

function mapa(){
	exibir("paginas/mapa");
}