<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitização e validação dos dados do formulário
    $name = htmlspecialchars(trim($_POST['name']));
    $cpf = htmlspecialchars(trim($_POST['cpf']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Validação do CPF (exemplo básico)
    // CPF deve ter exatamente 11 dígitos numéricos
    if (preg_match('/^\d{11}$/', $cpf)) {
        // Processar o cadastro (por exemplo, salvar no banco de dados)
        // Exemplo de mensagem de sucesso
        echo '<p class="message success">Cadastro realizado com sucesso!</p>';
    } else {
        // Mensagem de erro
        echo '<p class="message error">Número do CPF inválido. Deve conter exatamente 11 dígitos numéricos.</p>';
    }
} else {
    echo '<p class="message error">Método de requisição não suportado.</p>';
}
?>
