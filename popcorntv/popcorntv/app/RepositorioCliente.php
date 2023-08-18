<?php
/*
 * precisamos:
 * cadastrar
 * listar
 * exluir
 * alterar
 */
require_once  'autoload.php';

interface IClientes{
    public function cadastrarCliente($Cliente);
    public function removerCliente($codigo);
    public function atualizarCliente($Cliente);
    public function listarCliente($Clinte);
}

class RepositorioCliente implements IClientes
{
    //atribudo que guarda a conexao
    private  $conexao;

    //ao iniciar a classe e instaciada uma nova conexao
    public function __construct()//construtor vazio porque nao recebo nada como paramentro ao instaciar o repositorio
    {
        //atribuindo um objeto conexao ao atributo conexao
        $this->conexao = new  Conexao("localhost","root","","popcorntv");
        //agora chamaremos o metodo responsavel por fazer a conexao
        $conect = $this->conexao->conectar();

    }
    public function cadastrarCliente($Cliente)
    {
       echo $Cliente->getNome();
    }
    public function atualizarCliente($Cliente)
    {
        // TODO: Implement atualizarCliente() method.
    }

    public function removerCliente($codigo)
    {
        // TODO: Implement removerCliente() method.
    }

    public function listarCliente($Clinte)
    {
        // TODO: Implement listarCliente() method.
    }

}//final classe

$Cliente = new Cliente("timoteo","santos",96);
$repositorioCliente = new RepositorioCliente();
$repositorioCliente->cadastrarCliente($Cliente);