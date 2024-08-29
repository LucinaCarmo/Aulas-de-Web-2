<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Senha de 6 Dígitos</title>
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
            max-width: 500px;
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
        <h1>Cadastro - Senha de 6 Dígitos</h1>
        <form action="processa_cadastro.php" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" placeholder="Digite seu nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">Número do CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
            </div>
            <div class="form-group">
                <label for="address">Endereço:</label>
                <input type="text" id="address" name="address" placeholder="Digite seu endereço" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
