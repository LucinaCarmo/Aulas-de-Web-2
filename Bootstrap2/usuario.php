<?php
include 'conexao.php';
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome =filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$senha =filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email =filter_input(INPUT_POST, 'enderecoEletronico', FILTER_SANITIZE_EMAIL);
$sexo =filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$concordo =filter_input(INPUT_POST, 'aceite', FILTER_SANITIZE_STRING);

$salvar="INSERT INTO `cadastrousuario`(`nome`,`sobrenome`,`sexo`,`senha`,`email`,`concordo`)VALUES
('$nome','$sobrenome','$sexo','$senha','$email','$concordo')";
$bd = mysqli_query($conexao, $salvar);

if ($bd) {
    echo "<script>
    alert('Usuário cadastrado com sucesso!');
    window.location.href = '../logar.html';
  </script>";
} else {
    echo "Erro ao cadastrar o usuário: "
     . mysqli_error($conexao);
}

// Fechando a conexão
$conexao->close();
?>