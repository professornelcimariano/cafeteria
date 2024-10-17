<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "../../conn/conect.php";
    include "../_inc/menu.php";

    $id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($produto) {
    ?>
        <form action="insert.php" method="post">
            <label for="">Nome </label> <br>
            <input type="text" name="nome" id="" value="<?= $produto['nome'] ?>"> <br>
            <label for="">Descrição </label> <br>
            <input type="text" name="descricao" id="" value="<?= $produto['descricao'] ?>" <br>
            <input type="submit" value="Cadastrar">
        </form>

    <?php
    } else {
        echo "Produto não encontrado.";
    }
    ?>

</body>

</html>