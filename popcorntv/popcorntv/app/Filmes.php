<?php
class Filmes
{
    //metodos
    private $titulo;
    private $codigo;
    private $sinopse;
    private $quantidade;
    private $trailer;

    //construtor
    public function __construct($titulo,$codigo,$sinopse,$quantidade,$trailer)
    {
        $this->titulo = $titulo;
        $this->codigo = $codigo;
        $this->sinopse = $sinopse;
        $this->quantidade = $quantidade;
        $this->trailer = $trailer;
    }

    //metodos de get e set de todos os dados
    public function getTitulo() //quanto uma funcao tem retorno podemo diver qual tipo de retorno
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo)
    {
        $this->codigo = $codigo;
    }

    public function getSinopse()
    {
        return $this->sinopse;
    }

    public function setSinopse(string $sinopse)
    {
        $this->sinopse = $sinopse;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getTrailer()
    {
        return $this->trailer;
    }

    public function setTrailer(string $trailer)
    {
        $this->trailer = $trailer;
    }

}