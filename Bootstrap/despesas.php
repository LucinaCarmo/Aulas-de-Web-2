<?php
include 'PHP/conexaobanco1.php';
session_start();
$contas = $_SESSION['contas']??'';

$totalFormatado = $_SESSION['totalFormatado']??'0,00';
$despesas=["Despesa com Funcionário"=>["Salário","Vale transporte","Vale alimentação"], "Despesa com Carros"=>["Oficina","Gasolina","Lavagem"],
"Despesas Fixas"=>["luz","Água","Aluguel"],"Despesas Eventuais"=>["Solicitar autorização"]];
$tipoSelecionado = $_POST["tipo"]??'';
$descricoes = $tipoSelecionado? $despesas[$tipoSelecionado]:[];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="PHP/css/style.css">
    <title>Cadastrar Veículo - Autoescola</title>
    
       
</head>
<body>
<div class="container">
    <h1>Controle de Despesas</h1>
    <form action="" method="post">
        <label for="tipo">Tipo de Despesa:</label>
        <select id="tipo" name="tipo" required onchange="this.form.submit()">
            <option value="">Escolha a despesa</option>
            <?php
            foreach($despesas as $tipo => $desc):?>
            <option value="<?php echo $tipo;?>" <?php echo $tipo ===$tipoSelecionado? 'selected':'';?>><?php echo $tipo; ?></option>
            <?php endforeach ?>
        </select>   
     </form>
        <form action="php/contas.php" method="post">
            <input type="hidden" name="tipo" value="<?php echo $tipoSelecionado;?>">
        <label for="descricao">Descrição:</label>
       <select name="descricao" id="descricao" require>
        <?php
            if($descricoes):?>
            <?php foreach($descricoes as $descricao):?>
                <option value="<?php echo $descricao;?>">
                <?php echo $descricao; ?>
            </option>
            <?php endforeach;?>
                 <?php endif;?>
            
    </select>

        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required max="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d', strtotime('-30 days'));?>">

        <button class="button" type="submit">Cadastrar</button>


    <h2>Lista de Despesas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $contas ?>
        </tbody>
    </table>

    <h3>Total: R$<?php echo $totalFormatado; ?></h3>
</div>
</body>
</html>