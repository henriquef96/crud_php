<?php
session_start();
require('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Proteção contra SQL Injection usando consultas preparadas
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
    } else {
        $_SESSION['mensagem'] = 'Usuário não encontrado.';
        header('Location: index.php');
        exit;
    }

    $stmt->close();
} else {
    $_SESSION['mensagem'] = 'ID do usuário não fornecido.';
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">

                    <div class="card-header border-0">
                        <h4>Editar Usuário
                            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="id" value="<?=$usuario['id']?>">

                            <div class="mb-3">
                                <label for="">Nome</label>
                                <input type="text" name="nome" value="<?=$usuario['nome']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">E-mail</label>
                                <input type="text" name="email" value="<?=$usuario['email']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" value="<?=$usuario['data_nascimento']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>