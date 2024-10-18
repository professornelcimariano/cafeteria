<?php
include '../../conn/conect.php';
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "UPDATE produtos SET nome = :nome, descricao = :descricao WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nome', $data['nome']);
$stmt->bindValue(':descricao', $data['descricao']);
$stmt->bindValue(':id', $id);

if ($stmt->execute()) {
    echo "Produto atualizado com sucesso!";
    header("Location: " . $base . "/admin/produtos/select.php");
    exit();
} else {
    echo "Erro ao atualizar o produto.";
}
