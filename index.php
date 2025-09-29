<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Bolsa Família</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Cadastro Bolsa Família</h1>
            <p>Preencha todos os dados abaixo para solicitar o benefício</p>
        </header>

        <?php if (isset($_SESSION['msg'])): ?>
        <div class="message <?php echo $_SESSION['msg_type']; ?>">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                unset($_SESSION['msg_type']);
                ?>
        </div>
        <?php endif; ?>

        <form action="processa_cadastro.php" method="POST" class="cadastro-form">
            <!-- Dados Pessoais -->
            <div class="form-section">
                <h2>Dados Pessoais do Responsável</h2>

                <div class="form-group">
                    <label for="nome_responsavel">Nome Completo *</label>
                    <input type="text" id="nome_responsavel" name="nome_responsavel" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="cpf_responsavel">CPF *</label>
                        <input type="text" id="cpf_responsavel" name="cpf_responsavel" placeholder="000.000.000-00"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento *</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email">
                    </div>
                </div>
            </div>

            <!-- Endereço -->
            <div class="form-section">
                <h2>Endereço</h2>

                <div class="form-group">
                    <label for="endereco">Logradouro *</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Rua, Avenida, etc." required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="numero">Número *</label>
                        <input type="text" id="numero" name="numero" required>
                    </div>

                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" id="complemento" name="complemento">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="bairro">Bairro *</label>
                        <input type="text" id="bairro" name="bairro" required>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade *</label>
                        <input type="text" id="cidade" name="cidade" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="estado">Estado *</label>
                        <select id="estado" name="estado" required>
                            <option value="">Selecione</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <!-- Adicione todos os estados -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cep">CEP *</label>
                        <input type="text" id="cep" name="cep" placeholder="00000-000" required>
                    </div>
                </div>
            </div>

            <!-- Situação Familiar -->
            <div class="form-section">
                <h2>Situação Familiar</h2>

                <div class="form-row">
                    <div class="form-group">
                        <label for="qtd_pessoas">Quantidade de Pessoas na Família *</label>
                        <input type="number" id="qtd_pessoas" name="qtd_pessoas" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="renda_mensal">Renda Familiar Mensal (R$) *</label>
                        <input type="number" id="renda_mensal" name="renda_mensal" step="0.01" min="0" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="observacoes">Observações</label>
                    <textarea id="observacoes" name="observacoes" rows="4"
                        placeholder="Informações adicionais sobre a situação familiar"></textarea>
                </div>
            </div>

            <button type="submit" class="btn-submit">Enviar Cadastro</button>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>

</html>
