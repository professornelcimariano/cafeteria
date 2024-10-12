<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">
        <?php
        include '../../conn/conect.php';
        try {

            $sql = "SELECT * FROM produtos";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultados) > 0) {
                foreach ($resultados as $resultado) {
        ?>
                    <tr>
                        <th scope="row"><?= $resultado['id'] ?></th>
                        <td><?= $resultado['nome'] ?></td>
                        <td><?= $resultado['descricao'] ?></td>
                    </tr>
        <?php
                }
            } else {
                echo "Nenhum produto encontrado.";
            }
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
        }

        ?>
    </table>