<?php

class Mensagem
{
    private $texto;
    private $css;

    public function sucesso(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-success';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    public function redenrizar(): string
    {
        return "<div class='{$this->css}'>{$this->texto}</div>";

    }

    private function filtrar(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_DEFAULT);
    }
}

