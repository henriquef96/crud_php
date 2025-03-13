<?php require('conexao.php') ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php') ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm">

                    <div class="card-header border-0">
                        <h4>Adicionar Usuário
                            <a href="index.php" class="btn btn-secondary float-end">Voltar</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="acoes.php" method="POST">

                            <div class="mb-3">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label for="">E-mail</label>
                                <input type="text" name="email" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label for="">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control">
                            </div>


                            <div class="mb-3">
                                <label for="">Senha</label>
                                <input type="password" name="senha" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="create_usuario" class="btn btn-primary">Salvar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>