<?php

function uploadImagem($nome_tmp_imagem, $nome_imagem) {
    $extensao = strtolower(substr($nome_imagem, -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "publico/produtos/";
    move_uploaded_file($nome_tmp_imagem, $diretorio . $novo_nome);
    return $diretorio . $novo_nome;
}
