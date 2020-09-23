<?php

/**
 * Esse arquivo controla as requisições (perguntas) e também
 * contém as questões (regras)
 */

include("Bot.php");
$bot = new Bot();

# Criando as regras do Bot
$questions = [
    "qual seu nome" => "Meu nome é " . $bot->getName(),
    "php" => "É uma linguagem de programação Server Side.",
    "linux" => "É um sistema operacional Open Source desenvolvido por Linus Torvald.",
    "dns" => "O DNS (Domain Name System) é um sistema de gestão de nomes para computadores",
    "o que é um chatbot" => "É um programa de computador que tenta simular um ser humano."
];

# Processa a requisição das perguntas
if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;

        $generics = [
            'oi', 'oiiii', 'oie', 'ola', 'olá', 'bom dia',
            'boa noite', 'boa tarde', 'hey', 'hello'
        ];

        if (in_array($msg, $generics)) {
            $botty->reply('Olá. Em que posso ajudar?');
        } elseif ($botty->ask($msg, $questions)) {
            $botty->reply('Desculpe, não entendi.');
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }
    });
}
