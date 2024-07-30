<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Cadastrar Aluno - Autoescola</title>
    
</head>
<body>
    <div class="container">
        <h1>Cadastrar Aluno</h1>
        <form action="php/cadastrar_aluno.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>">
            
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?php echo isset($_SESSION['cpf']) ? $_SESSION['cpf'] : ''; ?>">
            
            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" value="<?php echo isset($_SESSION['celular']) ? $_SESSION['celular'] : ''; ?>">
            
            <label for="zap">Tem WhatsApp?</label>
            <select id="zap" name="zap">
                <option value="sim" <?php echo (isset($_SESSION['whatsapp'])&& $_SESSION['whatsapp'] == 'sim') ? 'selected' : ''; ?>>Sim</option>
                <option value="não" <?php echo (isset($_SESSION['whatsapp'])&& $_SESSION['whatsapp'] == 'não') ? 'selected' : ''; ?>>Não</option>
            </select>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria">
                <option value="A" <?php echo (isset($_SESSION['categoria'])&& $_SESSION['categoria'] == 'A') ? 'selected' : ''; ?>>A</option>
                <option value="B" <?php echo (isset($_SESSION['categoria'])&& $_SESSION['categoria'] == 'B') ? 'selected' : ''; ?>>B</option>
                <option value="C"<?php echo (isset($_SESSION['categoria'])&& $_SESSION['categoria'] == 'C') ? 'selected' : ''; ?>>C</option>
                <option value="D"<?php echo (isset($_SESSION['categoria'])&& $_SESSION['categoria'] == 'D') ? 'selected' : ''; ?>>D</option>
                <option value="E" <?php echo (isset($_SESSION['categoria'])&& $_SESSION['categoria'] == 'E') ? 'selected' : ''; ?>>E</option>
            </select>
            
            <button type="submit" name="cadastrar" class="button">Cadastrar</button>
            <button type="submit" name="buscar" class="button" >Busca por CPF</button>

        </form>
    </div>
</body>
</html>
