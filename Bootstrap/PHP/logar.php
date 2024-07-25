<?php
include 'conexaobanco1.php';
if(isset($_POST['logar'])){
    $email = filter_input(INPUT_POST,'cpEmail',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'cpSenha',FILTER_SANITIZE_STRING);
    if(strlen($_POST['cpEmail'])==0){
        echo"Preencha seu e-mail";
    }else if(strlen($_POST['cpSenha'])==0){
        echo "Preencha sua senha.";
    }else{

    }
}
 
echo $email.' .' . $senha;

?>