<?php require 'conexao.php';?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header border-0">
                        <h4>Detalhes do Usuário
                            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE id = $usuario_id";
                            $query = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $usuario = mysqli_fetch_assoc($query); ?>

                                <div class="mb-3">
                                    <strong>ID:</strong>
                                    <p class="form-control"><?= $usuario['id'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <strong>Nome:</strong>
                                    <p class="form-control"><?= htmlspecialchars($usuario['nome']) ?></p>
                                </div>

                                <div class="mb-3">
                                    <strong>E-mail:</strong>
                                    <p class="form-control"><?= htmlspecialchars($usuario['email']) ?></p>
                                </div>
                                <div class="mb-3">
                                    <strong>Data de Nascimento:</strong>
                                    <p class="form-control"><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></p>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<h5 class='text-danger'>ID do usuário não fornecido.</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>