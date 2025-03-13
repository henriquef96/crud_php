<?php

session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    // Definir variáveis
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $data_nascimento = trim($_POST['data_nascimento']);
    $senha = trim($_POST['senha']);

    // Verifica se algum campo está vazio
    if (empty($nome) || empty($email) || empty($data_nascimento) || empty($senha)) {
        $_SESSION['mensagem'] = 'Todos os campos são obrigatórios.';
        header('Location: index.php');
        exit;
    }

    // Proteção contra SQL Injection usando consultas preparadas
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $data_nascimento, $senha);

    // Hash da senha
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao criar usuário: ' . $stmt->error;
    }

    $stmt->close();

    header('Location: index.php');
    exit;
}

if (isset($_POST['update_usuario'])) {
    // Definir variáveis
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $data_nascimento = trim($_POST['data_nascimento']);
    $senha = trim($_POST['senha']);

    // Verifica se algum campo está vazio
    if (empty($id) || empty($nome) || empty($email) || empty($data_nascimento) || empty($senha)) {
        $_SESSION['mensagem'] = 'Todos os campos são obrigatórios.';
        header('Location: index.php');
        exit;
    }

    // Proteção contra SQL Injection usando consultas preparadas
    $stmt = $conexao->prepare("UPDATE usuarios SET nome = ?, email = ?, data_nascimento = ?, senha = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nome, $email, $data_nascimento, $senha, $id);

    // Hash da senha
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar usuário: ' . $stmt->error;
    }

    $stmt->close();

    header('Location: index.php');
    exit;
}

if (isset($_POST['delete_usuario'])) {
    // Definir variável
    $id = trim($_POST['id']);

    $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = 'Usuário excluído com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Erro ao excluir usuário: ' . $stmt->error;
    }

    $stmt->close();

    header('Location: index.php');
    exit;
}