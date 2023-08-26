<?php
require_once  'autoload.php';

interface IClientes{
    public function cadastrarCliente($Cliente);
    public function removerCliente($codigo);
    public function atualizarCliente($Cliente);
    public function listarCliente();
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

    //cadastrar cliente
    public function cadastrarCliente($Cliente)
    {
        //atribuindo os dados do objeto $Cliente nas variaveis
       $nome = $Cliente->getNome();
       $sobreNome = $Cliente->getSobreNome();
       $cpf = $Cliente->getCpf();

       //fazendo o insert com os dados das variaveis
       $sql = "INSERT INTO clientes(nome,sobrenome,cpf) VALUES ('$nome', '$sobreNome', '$cpf')";
       $this->conexao->execultarQuery($sql);
    }

    public function removerCliente($codigo)
    {
        // TODO: Implement removerCliente() method.
        $sql = "DELETE FROM clientes WHERE id = $codigo ";
        $this->conexao->execultarQuery($sql);
    }


    public function atualizarCliente($Cliente)
    {
        // TODO: Implement atualizarCliente() method.
        //atribuindo os dados do objeto $Cliente nas variaveis
        $nome = $Cliente->getNome();
        $sobreNome = $Cliente->getSobreNome();
        $cpf = $Cliente->getCpf();
        $codigo = $Cliente->getCodigo();

        $sql = "UPDATE clientes SET nome='$nome',sobrenome = '$sobreNome',cpf='$cpf' WHERE id = '$codigo' ";
        $this->conexao->execultarQuery($sql);
    }
	
	//listar todos os clientes
    public function listarCliente()
    {
        // TODO: Implement listarCliente() method.
		
		$listagem = $this->conexao->execultarQuery("SELECT * FROM clientes");
		
		$arrayClientes = array();
		
		while ($linha = mysqli_fetch_array($listagem))
		{
			$Clientes = new Cliente (
			
				$linha['nome'],
				$linha['sobrenome'],
				$linha['cpf'],
				$linha['id']
			);
			array_push($arrayClientes,$Clientes);
		}
		
		return $arrayClientes;

    }
	
	//listar um cliente pelo codigo
    public function buscarCliente($codigo)
    {
        // TODO: Implement listarCliente() method.
		
		$listagem = $this->conexao->execultarQuery("SELECT * FROM clientes WHERE id = '$codigo'");
		
		while ($linha = mysqli_fetch_array($listagem))
		{
			$Cliente = new Cliente (
			
				$linha['nome'],
				$linha['sobrenome'],
				$linha['cpf'],
				$linha['id']
			);
		
		return $Cliente;
		
		}
    }	

}//final classe

$repositorioCliente = new RepositorioCliente();