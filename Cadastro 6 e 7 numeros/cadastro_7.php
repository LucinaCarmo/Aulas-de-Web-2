<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Senha de 7 Dígitos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro - Senha de 7 Dígitos</h1>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <?php
            // Sanitização e validação dos dados do formulário
            $name = htmlspecialchars($_POST['name']);
            $ra = htmlspecialchars($_POST['ra']);
            
            // Verificação básica do formato RA
            if (preg_match('/^\d{7}$/', $ra)) {
                // Mensagem de sucesso
                echo '<p class="message success">Cadastro realizado com sucesso!</p>';
            } else {
                // Mensagem de erro
                echo '<p class="message error">Número RA inválido. Deve conter exatamente 7 dígitos.</p>';
            }
            ?>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="ra">Número RA:</label>
                <input type="text" id="ra" name="ra" placeholder="Digite seu número RA" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
