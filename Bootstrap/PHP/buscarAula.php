<?php
include 'conexaobanco1.php';
$sql = "SELECT * FROM aula";

if(isset($_POST['instrutor'])||isset($_POST['nome_aluno'])){
    $instrutor = $_POST['instrutor'];
    $aluno = $_POST['nome_aluno'];
}
?>