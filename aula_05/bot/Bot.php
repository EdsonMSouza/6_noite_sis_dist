<?php

# Classe responsável pelo gerenciamento das mensagens
class Bot
{
    private $name = "Chatbot";

    public function getName()
    {
        return $this->name;
    }

    # método para "ouvir" as mensagens enviadas
    public function hears($message, callable $call)
    {
        $call(new Bot);
        return $message;
    }

    # Resposta do Bot
    public function reply($response)
    {
        print($response);
    }

    # Método que processa a pergunta
    # ["oi" => "Oi, tudo bem!"]
    public function ask($question, array $questionDictionary)
    {
        $question = trim($question);
        foreach ($questionDictionary as $questions => $value) {
            if ($question == $questions) {
                return $value;
            }
        }
    }
}
