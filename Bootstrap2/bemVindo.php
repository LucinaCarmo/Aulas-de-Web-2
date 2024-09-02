<?php
session_start();
if(isset($_SESSION['nome'])){
    $nomeUsuario =$_SESSION['nome'];

}else{
    header("location: logar.html");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Página Inicial - Autoescola</title>
   
</head>
<body>
    <?php
        include_once "navegador.html";
    ?>
    <div class="container">
        <h1>Olá, <?php echo htmlspecialchars($nomeUsuario)?>!</h1>
        <p>Hoje é dia <span id="dataAtual"></span>.</p>
        <p>Clique no menu e escolha o que deseja fazer:</p>
        <div class="menu">
            <a href="cadAluno.php">Cadastrar Aluno</a>
            <a href="cadCarro.html">Cadastrar Carro</a>
            <a href="cadastrarAula.php">Agendar Aula</a>
        </div>
    </div>
    <script>
            function formatarData(data){
                //formatar a aprência da data
                const opcao ={ weekday:'long', year:'numeric',
                month:'numeric', day:'numeric'}
                return data.toLocaleDateString('pt-BR',opcao)

            }
            //innerText = sobrescreve uma informação
            document.getElementById('dataAtual').innerText = 
            formatarData(new Date())

        </script>


    
</body>
</html>
