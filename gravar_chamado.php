<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_destinatario = $_POST['destinatario_chamado'] ?? null;
    $titulo_chamado = $_POST['titulo_chamado'] ?? null;
    $mensagem_chamado = $_POST['mensagem_chamado'] ?? null;
    $prioridade_chamado = $_POST['prioridade_chamado'] ?? null;

    $sql = "INSERT INTO chamados (id_destinatario, titulo_chamado, mensagem_chamado, prioridade_chamado)
            VALUES (:id_destinatario, :titulo_chamado, :mensagem_chamado, :prioridade_chamado)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id_destinatario', $id_destinatario);
    $stmt->bindParam(':titulo_chamado', $titulo_chamado);
    $stmt->bindParam(':mensagem_chamado', $mensagem_chamado);
    $stmt->bindParam(':prioridade_chamado', $prioridade_chamado);
    $stmt->execute();

    header("Location:index.php");
}else{
    echo "nao deu pra gravar.";
}