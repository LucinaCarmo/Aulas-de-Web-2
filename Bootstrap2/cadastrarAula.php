<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Agendar Aula - Autoescola</title>
   
</head>
<body>
<?php
        include_once "navegador.html";
    ?>
    <div class="container">
        
        <?php
        include 'php/conexao.php';
        
        // Inicializa as variáveis
        $id = '';
        $instrutor = '';
        $cpf = '';
        $aluno = '';
        $data = '';
        $hora = '';
        $paga = '';
        $carro = '';
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            ?>
            <h1>Editar Aula</h1>
            <?php
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
                $paga = $linha['pago'];
                $carro = $linha['veiculo'];
            }
            
            $stmt->close();
            $conexao->close();
        }else{
        ?>
            <h1>Agendar Aula</h1>      
        <?php
        }
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
            
            <button type="submit" name="agendar" class="button">Agendar</button>
        </form>
    </div>
    <script>
        window.onload = function(){
            if($id==null){
                alert("cadê id?")
            }
        }
    </script>
</body>
</html>
