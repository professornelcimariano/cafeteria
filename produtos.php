<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  //Conexão com o Banco de Dados
  include 'conn/conect.php';
  //Include do menu
  include '_inc/menu.php';
  ?>

  <div class="container">
    <div class="row">
    <h2 class="text-center mt-5"> Exemplo de Consumo de Dados tabela </h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Link</th>
          </tr>
        </thead>
        <tbody>
          <?php
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
                  <td> <a href="<?= $base; ?>/single_produto.php?id=<?= $resultado['id'] ?>"> <?= $resultado['nome'] ?> </a> </td>
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

        </tbody>
      </table>

    </div>
  </div>



  <?php
  include '_inc/footer.php';
  ?>