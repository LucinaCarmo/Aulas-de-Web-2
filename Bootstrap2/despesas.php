<?php
include 'php/conexao.php';
session_start();
if(isset($_SESSION['nome'])){
    $nomeUsuario =$_SESSION['nome'];

}else{
    header("location: logar.html");
}
   $contas = $_SESSION['contas']??'';
    $totalFormatado = $_SESSION['totalFormatado']??'0,00';
    $despesas = ["Despesa com Funcionário"=>
    ["Salario","Vale transporte","Vale alimentação"],
    "Despesa com Carros"=>["Oficina","Gasolina",
    "Lavagem"],
    "Despesas Fixas"=>["Luz","Agua","Aluguel"],
    "Despesas Eventuais"=>["Solicitar autorização"]];

    $tipoSelecionado =$_POST["tipo"]??'';
    $descricoes = $tipoSelecionado? $despesas[$tipoSelecionado]:[];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Cadastrar Veículo - Autoescola</title>
      
</head>
<body>
<?php
        include_once "navegador.html";
    ?>
<div class="container">
    <h1>Controle de Despesas</h1>
    <form action="" method="post">
        <label for="tipo">Tipo de Despesa:</label>
        <select id="tipo" name="tipo" required onchange="this.form.submit()">
            <option value="">Escolha a despesa</option>
           <?php
                foreach($despesas as $tipo=>$desc):?>

           <option value="<?php echo $tipo;?>" <?php 
           echo $tipo ===$tipoSelecionado?'selected':'';?>>
           <?php echo $tipo; ?></option>
           <?php endforeach; ?>
        </select>
    </form>
    <form action="php/contas.php" method="post">
        <!-- Manter o valor do tipo selecionado -->
        <input type="hidden" name="tipo"  value="<?php echo $tipoSelecionado; ?>">

        <label for="descricao">Descrição:</label>
        <select name="descricao" id="descricao" require>
        <?php
            if($descricoes):?>
            <?php  foreach($descricoes as $descricao):?>
            <option value="<?php echo $descricao;?>">
                <?php echo $descricao; ?>
            </option>
            <?php 
                    endforeach; 
                    endif 
             ?>
            
        </select>

        <label for="valor">Valor:</label>
        <input type="text" id="valor" name="valor" required pattern="^\d+(,\d{1,2})?$" placeholder="Ex: 1000,00">
                    <?php $min = new DateTime();
                    $min ->modify("-30 days");
                    $max= new DateTime();
                    $max ->modify("0 days");
                    ?>
                    <label for="data">Data:</label>
        <input type="date" id="data" name="data" min=<?=$min->format("Y-m-d")?>  max=<?=$max->format("Y-m-d")?> required>

        <button class="button" type="submit">Cadastrar</button>
                                                                           
    </form>

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