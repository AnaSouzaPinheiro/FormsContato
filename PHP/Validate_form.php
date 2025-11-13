<?php

function validarNome($nome) {
    if (!$nome) return "Por favor, insira seu nome.";
    if (strlen($nome) < 3) return "Por favor, insira pelo menos 3 letras.";
    if (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $nome)) return "Nome inválido. Use apenas letras e espaços.";
    return null;
}

function validarTelefone($telefone) {
    if (!$telefone) return "Por favor, insira seu telefone.";
    if (!preg_match("/^\(?\d{2}\)?[\s-]?9?\d{4}[\s-]?\d{4}$/", $telefone)) return "Telefone inválido. Use o formato correto (ex: (DDD) 9XXXX-XXXX).";
    return null;
}

function validarEmail($email) {
    if (!$email) return "Por favor, insira seu e-mail.";
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "E-mail inválido. Use o formato nome@dominio.com.";
    }
    return null;
}

function validarAssunto($mensagem) {
    if (!$mensagem) return "Por favor, insira o assunto.";
    if (strlen($mensagem) < 5) return "Texto muito curto. Digite pelo menos 5 caracteres.";
    return null;
}

function validarMensagem($mensagem) {
    if (!$mensagem) return "Por favor, insira sua mensagem.";
    if (strlen($mensagem) < 5) return "Mensagem muito curta. Digite pelo menos 5 caracteres.";
    return null;
}