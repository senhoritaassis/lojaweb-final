<?php

function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "lojaweb");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}