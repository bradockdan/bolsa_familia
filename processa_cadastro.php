<?php
session_start();
require_once __DIR__ . '/config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $database = new Database();
        $db = $database->getConnection();

        // Limpar e validar dados
        $nome_responsavel = filter_var($_POST['nome_responsavel'], FILTER_SANITIZE_STRING);
        $cpf_responsavel = preg_replace('/[^0-9]/', '', $_POST['cpf_responsavel']);
        $data_nascimento = $_POST['data_nascimento'];
        $telefone = preg_replace('/[^0-9]/', '', $_POST['telefone']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_STRING);
        $numero = filter_var($_POST['numero'], FILTER_SANITIZE_STRING);
        $complemento = filter_var($_POST['complemento'], FILTER_SANITIZE_STRING);
        $bairro = filter_var($_POST['bairro'], FILTER_SANITIZE_STRING);
        $cidade = filter_var($_POST['cidade'], FILTER_SANITIZE_STRING);
        $estado = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
        $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);
        $qtd_pessoas = intval($_POST['qtd_pessoas']);
        $renda_mensal = floatval($_POST['renda_mensal']);
        $observacoes = filter_var($_POST['observacoes'], FILTER_SANITIZE_STRING);

        // Verificar se CPF já existe
        $query = "SELECT id FROM cadastros WHERE cpf_responsavel = :cpf";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':cpf', $cpf_responsavel);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['msg'] = "CPF já cadastrado no sistema.";
            $_SESSION['msg_type'] = "error";
            header("Location: index.php");
            exit();
        }

        // Inserir no banco de dados
        $query = "INSERT INTO cadastros (
            nome_responsavel, cpf_responsavel, data_nascimento, telefone, email,
            endereco, numero, complemento, bairro, cidade, estado, cep,
            qtd_pessoas, renda_mensal, observacoes
        ) VALUES (
            :nome, :cpf, :nascimento, :telefone, :email,
            :endereco, :numero, :complemento, :bairro, :cidade, :estado, :cep,
            :qtd_pessoas, :renda, :observacoes
        )";

        $stmt = $db->prepare($query);

        $stmt->bindParam(':nome', $nome_responsavel);
        $stmt->bindParam(':cpf', $cpf_responsavel);
        $stmt->bindParam(':nascimento', $data_nascimento);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':qtd_pessoas', $qtd_pessoas);
        $stmt->bindParam(':renda', $renda_mensal);
        $stmt->bindParam(':observacoes', $observacoes);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "Cadastro realizado com sucesso! Aguarde a análise.";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['msg'] = "Erro ao realizar cadastro. Tente novamente.";
            $_SESSION['msg_type'] = "error";
        }
    } catch (PDOException $exception) {
        $_SESSION['msg'] = "Erro no sistema: " . $exception->getMessage();
        $_SESSION['msg_type'] = "error";
    }

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}