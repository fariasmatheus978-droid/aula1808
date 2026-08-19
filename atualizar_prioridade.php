<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_chamado = $_POST['id_chamado'] ?? null;
    $prioridade_chamado = $_POST['prioridade_chamado'] ?? null;

    if ($id_chamado && $prioridade_chamado) {
        // Prepara o comando de UPDATE
        $sql = "UPDATE chamados SET prioridade_chamado = :prioridade WHERE id_chamado = :id";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':prioridade', $prioridade_chamado);
        $stmt->bindParam(':id', $id_chamado);
        $stmt->execute();
    }
}
// Redireciona de volta para a sua página principal (ajuste o nome se não for index.php)
header("Location: index.php");
exit;
?>