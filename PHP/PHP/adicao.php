<?php
      $num01 = $_POST["Numero1"];
      $num02 = $_POST["Numero2"];
      $soma = ($num01+$num02);
  
          if ($soma >=20) {
            $resul=$soma+8;
          } else {
            $result=$soma-8;
          }
          echo "<script>
          if(confirm('Resultado é: $result, deseja realizar nova conta?')){
            window.location.href = '../atividade05.html'
          }else{
            window.location.href ='../index.html'
          }
          </script>";

        ?>