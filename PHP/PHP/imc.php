<?php
/*$altura = $_GET["altura"];
$genero=$_GET["sexo"];
if($genero =="M"){
    $resultado =(72.7 *altura) -58;
    echo "seu peso ideal é $resultado";
}else if($genero == "H"){
    $resulttado =(62.1 *$altura) -44.7;
    $formatado = number_format($resultado,2);
    echo "selecionado: homem é o seu peso ideal é $formatado";
}else{
    echo "Nada foi selecionado!!";
}
echo '<a href="../atividade04.html">Novo Cálculo?</a> <br>'
echo '<a href="../index.html">Início</a>'*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $altura = isset($_POST['altura']) ? $_POST['altura'] : null;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;

    // Verificar se os dados foram preenchidos corretamente
    if ($altura && $sexo) {
        // Calcular o peso ideal conforme a fórmula
        if ($sexo === "M") {
            $pesoIdeal = (72.7 * $altura) - 58;
        } else if ($sexo === "F") {
            $pesoIdeal = (62.1 * $altura) - 44.7;
        } else {
            // Caso o sexo não seja M ou F (embora os radios estejam required, é bom ter essa verificação)
            echo "Sexo inválido.";
            exit;
        }

        // Exibir o resultado
        echo "<h2>Resultado do Cálculo</h2>";
        echo "<p>Altura: $altura m</p>";
        echo "<p>Sexo: " . ($sexo === 'M' ? 'Masculino' : 'Feminino') . "</p>";
        echo "<p>Peso Ideal: " . number_format($pesoIdeal, 2, '.', '') . " kg</p>";

        // Link para recalcular
        echo '<p><a href="../atividade04.html">Calcular novamente</a></p>';
        echo '<p><a href="../index.html">Início</a></p>';

    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}
?>
