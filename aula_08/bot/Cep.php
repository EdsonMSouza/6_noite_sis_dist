<?php

class Cep
{
    private $data = array();

    public function __construct($cep)
    {
        // recupera os dados diretamente da API de cep e converte em um array associativo (True)
        $obj = json_decode(file_get_contents('https://api.postmon.com.br/v1/cep/' . $cep), true);
        $data = [
            $obj['logradouro'], #0
            $obj['bairro'], #1
            $obj['cidade'], #2
            $obj['estado'] #3
        ];

        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
