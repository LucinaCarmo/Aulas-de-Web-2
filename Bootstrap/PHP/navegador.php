<?php
session_start();
if(isset($_SESSION['nome'])){
$nomeUsuario =$_SESSION['nome'];
}else{
     header("location:../exercicioLogar.html");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Document</title>
  
</head>
<body>
<?php
    include_once "location:PHP/navegador.php";
    ?>
    <style>
        nav a{
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    nav a:hover{
        background-color: #ddd;
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    
    
    .menu-container {
    max-width: 1200px;
    margin: 0 auto;
    }
    
    nav {
        background-color: #007BFF;
        overflow: hidden;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
    }
    footer {
        background-color: #007BFF; 
        font-size: 15px;
        text-align: center;
        padding: 10px 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: fixed;
       
    }
    footer p{
        color: white;
        line-height: 0;
    }
    
      </style>
    <nav>
        <div class="menu-container">
            <a href="PHP/bemVindo.php">Início</a>
            <a href="cadAluno.php">Cadastrar Aluno</a>
            <a href="#">Cadastrar carro</a>
            <a href="../cadastrarAula.php">Cadastrar Aula</a>
            <a href="buscarAula.php">Buscar Aula</a>
            <a href="../despesas.php">Contas</a>
            <a href="sair.php">Sair</a>

        </div>
    </nav>
    <footer>
        <p>&copy; 2024 Auto Escola Lógica.</p>
        <p>Suporte Técnico:</p>
        <a href="mailto:suporte@email.com">
            <img src="IMG/gmail.png" width="2%" alt=""></a>
        <a href="https://wa.me/5532999999999" target="_blank">
            <img src="IMG/bolha-de-bate-papo.png" width="2%" alt=""></a>
    </footer>
</body>
</html>