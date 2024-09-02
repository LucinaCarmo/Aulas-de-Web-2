<?php
 $user = "root";
 $password ="1234";
 $bd = "autoescola2024";
 $host ="localhost";
 try{
      $conexao = mysqli_connect($host,$user, $password, $bd);
  /* traduzindo:servidor, usuario, senha,  banco de dados
     ordem das informações não pdoem ser alteradas */
     if ($conexao->connect_errno) {
         throw new Exception("Falha ao se conectar:
         (". $conexao->connect_errno . ") " .$conexao->connect_error);
     }
 
     echo "Conexão ok";         
 } 
 catch (Exception $e) { 
     echo $e->getMessage();        
 }



?>