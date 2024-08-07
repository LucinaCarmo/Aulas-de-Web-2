<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Aula - Autoescola</title>  
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background-color: #fff;
    padding: 20px 40px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 8px;
    text-align: center;
}
h1 {
    color: #333;
}
p {
    color: #666;
}
.menu {
    margin-top: 20px;
}
.menu a {
    display: block;
    margin: 10px 0;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}
.menu a:hover {
    background-color: #0056b3;
}


form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
label {
    margin-top: 10px;
    margin-bottom: 5px;
    color: #666;
}
input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 10px;
}
.button:hover {
    background-color: #0056b3;
}
    </style>
    <div class="container">
        <h1>Agendar Aula</h1>
        <?php
        include 'php/conexaobanco1.php';
        
        // Inicializa as variáveis
       
        $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
        $paga = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
        $carro =filter_input(INPUT_POST, 'carro', FILTER_SANITIZE_STRING);
        $salvar="INSERT INTO `aula`(`data`,`hora`,`instrutor`,`aluno`,`carro`,`paga`,`cpf`)VALUES
('$data','$hora','$instrutor','$aluno','$carro','$paga','$cpf)";
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Busca os dados da aula pelo ID
            $sql = "SELECT * FROM aula WHERE idaula = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Preenche os campos do formulário com os dados da aula
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $instrutor = $linha['instrutor'];
                $cpf = $linha['cpf'];
                $aluno = $linha['aluno'];
                $data = date('Y-m-d', strtotime($linha['data']));
                $hora = $linha['hora'];
                $paga = $linha['paga'];
                $carro = $linha['carro'];
            }
            
            $stmt->close();
        }
        
        $conexao->close();

        ?>
        <form action="php/editarSalvarAulas.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="instrutor">Nome do Instrutor:</label>
            <input type="text" id="instrutor" name="instrutor" value="<?php echo $instrutor; ?>" >

            <label for="aluno">CPF do Aluno:</label>
            <input type="text" id="cpf" name="cpf"value="<?php echo $cpf; ?>" >

            <button type="submit" class="button">Buscar</button>

            <label for="aluno">Nome do Aluno:</label>
            <input type="text" id="aluno" name="aluno" value="<?php echo $aluno; ?>" required>
            
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="<?php echo $data; ?>" required>
            
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" value="<?php echo $hora; ?>" required>
            
            <label for="paga">Aula Paga?</label>
            <select id="paga" name="paga">
                <option value="sim" <?php if ($paga == 'sim') echo 'selected'; ?>>Sim</option>
                <option value="nao"<?php if ($paga == 'não') echo 'selected'; ?>>Não</option>
            </select>
            
            <label for="carro">Marca do Carro:</label>
            <input type="text" id="carro" name="carro" value="<?php echo $carro; ?>" required>
            
            <button type="submit" id="idAgendar" name="agendar" class="button">Agendar</button>
        </form>
    </div>
</body>
</html>
