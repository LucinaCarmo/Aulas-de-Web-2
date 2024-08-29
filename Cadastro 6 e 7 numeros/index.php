<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
        }
        .success-6 {
            color: blue;
        }
        .success-7 {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="index.php" method="post">
            <input type="text" name="password" placeholder="Digite sua senha" maxlength="7" required>
            <br><br>
            <button type="submit">Entrar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $senha = $_POST['password'];

            if (preg_match('/^\d{6}$/', $senha)) {
                echo '<p class="message success-6">Senha de 6 dígitos detectada. Parabéns!</p>';
            } elseif (preg_match('/^\d{7}$/', $senha)) {
                echo '<p class="message success-7">Senha de 7 dígitos detectada. Excelente!</p>';
            } else {
                echo '<p class="message error">Senha inválida. A senha deve ter 6 ou 7 dígitos e conter apenas números.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
