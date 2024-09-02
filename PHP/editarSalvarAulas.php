<?php
    include 'conexao.php';
            //salvando o usuario
    if(isset($_POST['agendar'])){
        $id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $instrutor=filter_input(INPUT_POST, 'instrutor',FILTER_SANITIZE_STRING);
        $cpf=filter_input(INPUT_POST, 'cpf',FILTER_SANITIZE_STRING);
        $aluno=filter_input(INPUT_POST, 'aluno',FILTER_SANITIZE_STRING);
        $data=filter_input(INPUT_POST, 'data',FILTER_SANITIZE_STRING);
        $hora=filter_input(INPUT_POST, 'hora',FILTER_SANITIZE_STRING);
        $pago=filter_input(INPUT_POST, 'paga',FILTER_SANITIZE_STRING);
        $carro=filter_input(INPUT_POST, 'carro',FILTER_SANITIZE_STRING);
        //apaguei a verificação de campo em branco, perdi a paciência!!!
        if(!empty($id)){
            $queryDB = "UPDATE `aula` SET `data` = ?,`hora` =?,`instrutor` = ?,`aluno`=?,`veiculo` = ?,`pago` = ?,`cpf` = ? WHERE `idaula` =  ?";
            $declaracao = $conexao->prepare($queryDB);
            $declaracao->bind_param("sssssssi",$data,$hora,$instrutor,$aluno,$carro,$pago,$cpf,$id);
            if($declaracao->execute()){
                echo" <script>
                alert('Aula cadastrado com sucesso')";
                header("Location:../tabelaAula.php?message:Atualizado com sucesso!! ");
            }else{
               //fazer depois
             }
            
        }
        else{
            $declaracaoBD= $conexao->prepare("INSERT INTO`aula`(`data`,`hora`,`instrutor`,`aluno`,`veiculo`,`pago`,`cpf`)VALUES(?,?,?,?,?,?,?)");
            $declaracaoBD->bind_param("sssssss",$data,$hora,$instrutor,$aluno,$carro,$pago,$cpf);
            if ($declaracaoBD->execute()) {
                echo" <script>
                alert('Aula cadastrado com sucesso');
                window.location.href = '../cadastrarAula.php';
              </script>";
        
                } else {
                    echo "Erro ao cadastrar aula: " . $declaracaoBD->error;
                } 
        }
       
        }
    

?>