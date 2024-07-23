<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    $texto = $_POST['txt'];
    $tam = $_POST['tamanho'];
    $cor =$_POST['cores'];
    ?>
    <style>
        span.texto{
            font-size: <?php echo $tam;?>;
            color: <?php echo $cor; ?>;
        }
    </style>
</head>
<body>
 <h1>Veja o resultado do seu texto</h1>   
 <?php 
 echo"<span class = 'texto'> $texto </span>";
 ?>
</body>
</html>