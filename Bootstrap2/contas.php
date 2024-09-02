<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $data =filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $valor =filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
    $tipo =filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $valor = str_replace(',','.',$valor);
    $valor = floatval($valor);
    $declaracao = $conexao->prepare("
    INSERT INTO despesas (tipo, descricao, valor, data) VALUES (?, ?, ?, ?)
");
    $declaracao->bind_param("ssds", $tipo, $descricao, $valor, $data);
    
if ($declaracao->execute()) {
    //recarregar a lista de despesas após a inserção de dados
    $declaracao = $conexao->prepare("select tipo, descricao, valor, data from despesas
    order by data desc");
    $declaracao->execute();
    $resultado= $declaracao->get_result();
    $contas ="";
    while($linha = $resultado->fetch_assoc()){
        $valorFormatado = number_format($linha['valor'],2,',','.');
        $dataFormatada = date('d/m/Y', strtotime($linha['data']));
        $contas .="
        <tr>
            <td>{$linha['tipo']}</td>
            <td>{$linha['descricao']}</td>
            <td>R$ {$valorFormatado}</td>
            <td>{$dataFormatada}</td>
        </tr>";
    }
    $_SESSION['contas']=$contas;//salvando as informações na sessões
    
    //calculando o total
$declaracao = $conexao->prepare("SELECT SUM(valor) AS total FROM DESPESAS");
$declaracao->execute();
$resultado = $declaracao->get_result();
$row = $resultado->fetch_assoc();
$total = $row['total'] ?? 0;
$_SESSION['totalFormatado']= number_format($total, 2, ',', '.');

// Formatação do valor total para exibição

echo "<script>
        alert('Despesa cadastrada com sucesso');
        window.location.href = '../despesas.php';
    </script>";
} else {
    echo "Erro ao cadastrar despesa: " . $declaracao->error;
    
}
}
    
    ?>


