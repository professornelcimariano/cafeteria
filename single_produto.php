<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    //Conexão com o Banco de Dados
    include 'conn/conect.php';
    include '_inc/menu.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($produto) {
    ?>
        <div class="container">
            <div class="row">
                <h1 class="text-center"> <?= $produto['nome'] ?> </h1>
                <img class="img-fluid" src="img/<?= $produto['imagem'] ?>">
                <p> <?= $produto['descricao'] ?> </p>
            </div>
        </div>
    <?php
    } else {
        echo "Produto não encontrado.";
    }
    include '_inc/footer.php';
