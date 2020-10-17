<?php

class Cotacao
{
    private $data = array();

    public function __construct($moeda)
    {
        $url = "https://economia.awesomeapi.com.br/{$moeda}";
        $obj = json_decode(file_get_contents($url), True);

        foreach ($obj as $values) {
            foreach ($values as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }

    public function getData()
    {
        $data = new DateTime($this->data['create_date']);
        return [
            $data->format('d-m-Y H:i:s'),   # 0
            #$this->data['create_date'],
            $this->data['high'],            # 1
            $this->data['low']              # 2
        ];
    }
}
