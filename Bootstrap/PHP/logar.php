<?php
session_start();
include 'conexaobanco1.php';
if(isset($_POST['logar'])){
    $email = filter_input(INPUT_POST,'cpEmail',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'cpSenha',FILTER_SANITIZE_STRING);
    if(strlen($_POST['cpEmail'])==0){
        echo"<script>
alert('Seu email está em branco, preencha!!!')
window.location.href='../logar.html';</script>";
    }else if(strlen($_POST['cpSenha'])==0){
        echo "<script>
alert('Sua senha está em branco, preencha!!!')
window.location.href='../logar.html';</script>";
    }else{
     $stmt =$conexao ->prepare("select nome, idcadastrocliente from cadastrocliente where email= ? and senha = ?");
     $stmt->bind_param("ss", $email, $senha);
     $stmt->execute();
     $result = $stmt->get_result();
     if($result->num_rows == 1){
        $usuario = $result->fetch_assoc();
        $_SESSION['id'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        echo"<script>alert('Usuário verificado com sucesso!! Bem vindo ao sistema ".$usuario['nome']."!')
        window.location.href='../bemVindo.php'</script>";
        exit;
    }else{
        echo"Senha ou email incorreto.";
        exit;
        }
    }
}
 


?>