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
    //Include do menu
    include '_inc/menu.php';
    ?>

    <div id="carouselExampleDark" class="carousel carousel-dark slide mb-3">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/banner-1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/banner-1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/banner-1.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row">
            <h2 class="text-center"> Exemplo de Consumo de Dados com col e card </h2>
            <?php
            try {
                $sql = "SELECT * FROM produtos";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultados) > 0) {
                    foreach ($resultados as $resultado) {
            ?>
                        <div class="col-12 col-lg-4 mt-4">
                            <div class="card h-100 d-flex flex-column">
                                <!-- <img src="img/img1.png" alt=""> -->
                                <img src="./img/<?= $resultado['imagem'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $resultado['nome'] ?></h5>
                                    <p class="card-text"> <?= $resultado['descricao'] ?> </p>
                                </div>
                                <a class="btn btn-primary m-2" href="<?= $base; ?>/single_produto.php?id=<?= $resultado['id'] ?>"> Visitar </a>

                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "Nenhum produto encontrado.";
                }
            } catch (PDOException $e) {
                echo "Erro na consulta: " . $e->getMessage();
            }
            ?>



        </div>
    </div>

    <div class="container">
        <div class="row">
            <h2 class="text-center"> CATEGORIA </h2>
            <?php
            try {
                $sql = "SELECT * FROM categoria";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultados) > 0) {
                    foreach ($resultados as $resultado) {
            ?>
                        <div class="col-12 col-lg-4 mt-4">
                            <div class="card h-100 d-flex flex-column">
                                <!-- <img src="img/img1.png" alt=""> -->
                                <img src="./img/<?= $resultado['imagem'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $resultado['nome'] ?></h5>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "Nenhuma CATEGORIA encontrado.";
                }
            } catch (PDOException $e) {
                echo "Erro na consulta: " . $e->getMessage();
            }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    $sw = filter_input(INPUT_GET, 'sw', FILTER_DEFAULT);
    if (isset($sw)) {
    ?>
        <script>
            Swal.fire({
                title: 'Você quer continuar?',
                text: "Clique em 'Sim' para ir para outra página!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, redirecionar!',
                cancelButtonText: 'Não, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirecionar para a nova página
                    window.location.href = "http://localhost/cafeteria/";
                }
            });
        </script>

    <?php
    }
    ?>

    <?php
    include '_inc/footer.php';
    ?>