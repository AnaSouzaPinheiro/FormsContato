<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulariocontato";

$conx = new mysqli($servername, $username, $password, $dbname);

if ($conx->connect_errno) {
    echo "Erro!!!";
} else {
    echo "Sucesso!";
}

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['tel'];
  $nome = $_POST['email'];
  $email = $_POST['asst'];
  $mensagem = $_POST['msg'];

  // Lógica para enviar o e-mail ou salvar os dados em um banco de dados
}*/
?>