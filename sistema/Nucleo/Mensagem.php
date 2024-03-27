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

class MensagemErro
{
    private $textoerro;
    private $csserro;

    public function erro(string $mensagemErro): MensagemErro
    {
        $this->csserro = 'alert alert-danger';
        $this->textoerro = $this->filtrar($mensagemErro);
        return $this;
    }

    public function mostraErro(): string
    {
        return "<div class='{$this->csserro}'>{$this->textoerro}</div>";

    }

    private function filtrar(string $mensagemErro): string
    {
        return filter_var($mensagemErro, FILTER_DEFAULT);
    }
}
