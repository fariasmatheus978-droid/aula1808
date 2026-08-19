<?php

//4 variaveis principais 
$local = 'localhost';
$banco = 'elcio';
$usuario = 'root';
$senha = '';

//tentar uma conexao 
try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $erro){
    echo "Não deu" . $erro->getMessage();
}