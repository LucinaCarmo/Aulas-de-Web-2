<?php
include 'conexaobanco1.php'; // Inclua o arquivo de conexão com o banco de dados
if(isset($_POST['agendar'])){
        $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
        $paga = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
        $carro = filter_input(INPUT_POST, 'carro', FILTER_SANITIZE_STRING);

        if(empty($instrutor)||empty($cpf)||empty($aluno)||empty($data)||empty($hora)||empty($paga)||empty($carro)){
                echo"<script>alert('existe campo em branco')</script>";
        }else{
         $declaracaoBD=$conexao->prepare ("INSERT INTO `aula` (`data`, `hora`, `instrutor`, `aluno`, `carro`, `paga`, `cpf`) VALUES (?, ?, ?, ?, ?, ?, ?)");
         $declaracaoBD->bind_param("sssssss",$data,$hora,$instrutor,$aluno,$carro,$paga,$cpf);
        
         if ($declaracaoBD->execute()){
                echo"<script>
                alert('Aluno cadastrado com sucesso');
                window.location.href = '../cadastrarAula.php';
                </script>";
         }else{
                echo "Erro ao cadastrar aluno: " . $declaracaoBD->error;
         }

        }
}

?>