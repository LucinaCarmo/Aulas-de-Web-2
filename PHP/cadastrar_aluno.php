<?php
   session_start();
    include 'conexao.php';
    if(isset($_POST['Cadastrar'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf =filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $zap =filter_input(INPUT_POST, 'zap', FILTER_SANITIZE_STRING);
    $email =filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $categoria =filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    $celular =filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    if (empty($nome) || empty($cpf) || empty($celular) 
    || empty($email)) {
      echo" <script>
          alert('Preencha todos os campos!!!');
          window.location.href = '../cadAluno.php';
        </script>";
      //  exit;
    }
    $declaracao=$conexao->prepare("select cpf from cadaluno where cpf = ?");
    $declaracao->bind_param("s",$cpf);
    $declaracao->execute();
    $declaracao->store_result();
    if($declaracao->num_rows>0){
        echo" <script>
        alert('CPF já cadastrado!!!');
        window.location.href = '../cadAluno.php';
      </script>";
     $declaracao->close();
    }
    //$stmt
    $declaracao = $conexao->prepare("
    INSERT INTO cadaluno (nome, cpf, celular, zap, email,
     categoria) VALUES (?, ?, ?, ?, ?, ?)");
     
    $declaracao->bind_param
    ("ssssss", $nome, $cpf, $celular, $zap, $email, $categoria);
    if ($declaracao->execute()) {
        echo" <script>
        alert('Aluno cadastrado com sucesso');
        window.location.href = '../cadAluno.php';
      </script>";

        } else {
            echo "Erro ao cadastrar aluno: " . $declaracao->error;
        } 
    
    
    }
      
      if (isset($_POST['buscar'])) {
        $buscar_cpf = $_POST['cpf'];    
    
        $stmt = $conexao->prepare("SELECT nome, cpf, celular, zap, email, 
        categoria FROM cadaluno WHERE cpf = ?");
        $stmt->bind_param("s", $buscar_cpf);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($nome, $cpf, $celular, $zap, $email,
             $categoria);
            $stmt->fetch();
            $_SESSION['nome'] = $nome;
            $_SESSION['cpf'] = $cpf;
            $_SESSION['celular'] = $celular;
            $_SESSION['zap'] = $zap;
            $_SESSION['email'] = $email;
            $_SESSION['categoria'] = $categoria;
        header("Location: ../cadAluno.php");
          
    } else {
        echo "<script>
                alert('CPF não encontrado');
                window.location.href = '../cadAluno.php';
              </script>";
       // exit;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
}

exit;
       
    

    ?> 