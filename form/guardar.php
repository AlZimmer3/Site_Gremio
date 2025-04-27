<?php
// Configurações da base de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "formulario_recrutamento";

// Conectar
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar ligação
if ($conn->connect_error) {
    die("Falha na ligação: " . $conn->connect_error);
}

// Receber dados
$nome = $_POST['nome'];
$ano = $_POST['ano'];
$sugestoes = $_POST['sugestoes'];
$propostas = $_POST['propostas'];
$numero = $_POST['numero'];

// Inserir dados
$sql = "INSERT INTO recrutamento (nome, ano, sugestoes, propostas, numero) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $ano, $sugestoes, $propostas, $numero);

if ($stmt->execute()) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro ao enviar dados: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
