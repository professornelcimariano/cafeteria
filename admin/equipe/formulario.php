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
    ?>
    <form action="insert.php" method="post">
        <label for="">Nome </label> <br>
        <input type="text" name="nome" id=""> <br>
        <label for="">Descrição </label> <br>
        <input type="text" name="descricao" id=""> <br>
        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>