<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

require_once "Validate_form.php";

$nome     = trim($_POST['nome'] ?? '');
$email    = trim($_POST['email'] ?? '');
$assunto = htmlspecialchars(trim($_POST['assunto'] ?? ''), ENT_QUOTES, 'UTF-8');
$mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8');

$erros = [];

if ($erro = validarNome($nome)) $erros[] = $erro;
if ($erro = validarAssunto($assunto)) $erros[] = $erro;
if ($erro = validarEmail($email)) $erros[] = $erro;
if ($erro = validarMensagem($mensagem)) $erros[] = $erro;

if ($erros) {
    foreach ($erros as $erro) echo "<p class='error'>$erro</p>";
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0; 
    $mail->isSMTP();                                            
    $mail->Host       = ''; // <- subtitua                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = ''; // <- subtitua                    
    $mail->Password   = ''; // <- subtitua                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->setFrom('no-reply@testeformulario.com', 'Formulário');     

    $mail->isHTML(true);                                  
    $mail->Subject = 'Formulário enviado do site';
    $mail->Body = 
    'Nome: ' . $nome . "<br>" .
    'Assunto: ' . $assunto . "<br>" .
    'E-mail: ' . $email . "<br>" .
    'Mensagem: ' . $mensagem;

    $mail->AltBody = 
    'Nome: ' . $nome . "\n" .
    'Assunto: ' . $assunto . "\n" .
    'E-mail: ' . $email . "\n" .
    'Mensagem: ' . $mensagem;

    $mail->send();
    echo '<p class="success">Mensagem enviada com sucesso!</p>';
} catch (Exception $e) {
    echo "<p class='error'>Não foi possível enviar a mensagem. <br> Mailer Erro: {$mail->ErrorInfo}</p>";
}