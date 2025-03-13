<?php
session_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <?php include('mensagem.php'); ?>
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">

                    <div class="card-header border-0">
                        <h4>Lista de Usuários
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data de Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuarios';
                                $usuarios = mysqli_query($conexao, $sql);

                                if (mysqli_num_rows($usuarios) > 0) {
                                    while ($usuario = mysqli_fetch_assoc($usuarios)) {
                                ?>
                                        <tr>
                                            <td><?= $usuario['id'] ?></td>
                                            <td><?= $usuario['nome'] ?></td>
                                            <td><?= $usuario['email'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                                            <td>
                                                <a href="usuario.view.php?id=<?= $usuario['id'] ?>" class="btn btn-primary btn-sm">Visualizar</a>

                                                <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>

                                                <form method="POST" action="acoes.php" class="d-inline">
                                                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                                    <button type="submit" name="delete_usuario" class="btn btn-danger btn-sm">Excluir</button>
                                                </form>
                                            </td>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="text-center">Nenhum usuário encontrado.</td></tr>';
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>