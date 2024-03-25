<?php

class Mensagem
{
    private $texto;
    private $css;


    public function redenrizar(): string
    {
        return $this->texto = 'mensagem de texto masi uma vez';
    }

    private function filtrar(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_DEFAULT);
    }
}

