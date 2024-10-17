<?php
include '../../conn/conect.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
try {
    $sth = $conn->prepare('insert into produtos (nome, descricao) values (:nome, :descricao)');
    $sth->bindValue('nome', $data['nome']);
    $sth->bindValue('descricao', $data['descricao']);
    $sth->execute();
    header("Location: ".$base."/admin/produtos/select.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
