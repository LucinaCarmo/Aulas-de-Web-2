<?php
include 'conexaobanco1.php';
$sql = "SELECT * FROM aula";
$results = '';

if(isset($_POST['instrutor'])||isset($_POST['nome_aluno'])){
    $instrutor = $_POST['instrutor'];
    $aluno = $_POST['nome_aluno'];

    $sql .=" WHERE 1=1";
    if (!empty($instrutor)){
        $sql .=" AND instrutor like '%$instrutor%'";
    }
    if (!empty($aluno)){
        $sql .=" AND aluno like '%$aluno%'";
    }
}
$resultado =$conexao->query($sql);
if($resultado->num_rows>0){
    while($linha =$resultado->fetch_assoc()){
    $formatarData = date('d/m/y', strtotime($linha['data']));
    $formatarHora = date('H:i', strtotime($linha['hora']));/*I minúsculo 4 dígito*/ 

        $results .= "<tr>
                      <td>{$formatarData}</td>
                      <td>{$formatarHora}</td>
                      <td>{$linha['instrutor']}</td>
                      <td>{$linha['aluno']}</td>
                      <td>{$linha['veiculo']}</td>
                    </tr>
        
        ";
    }
    }else{
        $results ="<tr>
                   <td colspan='5'>Nenhuma aula encontrada</td>
                  </tr>
        ";
    }
    $conexao->close();
    header("Location:../tabelaAula.php?results=".urlencode($results));
    exit();

?>