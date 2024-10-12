<?php
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$sql = "DELETE FROM produtos WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()) {
    echo "Produto deletado com sucesso!";
} else {
    echo "Erro ao deletar o produto.";
}