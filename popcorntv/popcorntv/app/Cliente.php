<?php
class Cliente
{
    private $nome;
    private $sobreNome;
    private $cpf;

    public function __construct($nome,$sobreNome,$cpf)
    {
        $this->nome = $nome;
        $this->sobreNome = $sobreNome;
        $this->cpf = $cpf;
    }
    public  function getNome()
    {
        return $this->nome;
    }
    public function getSobreNome()
    {
        return $this->sobreNome;
    }
    public function getCpf()
    {
        return $this->cpf;
    }

    public  function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setSobrenome($sobreNome)
    {
        $this->sobreNome = $sobreNome;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
}