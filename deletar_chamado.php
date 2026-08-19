<?php

include 'conexao.php';

$id_chamado = $_GET['id_chamado'];

$sql = "DELETE FROM chamados WHERE id_chamado = :id_chamado";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_chamado', $id_chamado);
$stmt->execute();

header("Location:index.php");