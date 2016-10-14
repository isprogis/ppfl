<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Você está cadastrado! | Confêrencia Missioária 2016</title>
</head>

<body>
<?php
include("config.php");

$nome = $_POST["nome"];
$snome = $_POST["snome"];
$sexo = $_POST["sexo"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$telfix = $_POST["telfix"];
$telmov = $_POST["telmov"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$intersex = isset($_POST['intersex']) ? 1 : 0;
$intersab = isset($_POST['intersab']) ? 1 : 0;
$pernoitar = isset($_POST['pernoitar']) ? 1 : 0;
$criancas = $_POST["criancas"];


$sql = "INSERT INTO cadastroconf (`nome`, `snome`, `sexo`, `idade`, `email`, `telfix`, `telmov`, `estado`, `cidade`, `intersex`, `intersab`, `pernoitar`, `criancas`)
VALUES ('$nome', '$snome', '$sexo', '$idade', '$email', '$telfix', '$telmov', '$estado', '$cidade', '$intersex', '$intersab', '$pernoitar', '$criancas')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro bem sucedido !";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
</body>
</html>