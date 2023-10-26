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

       //verificar se o cpf ja tem cadastro
       $cadastroSistema = $this->pesquisarCpf($cpf);//verifica se o cpf consta no sistema
       if(isset($cadastroSistema))
       {
       
        //retorna uma viso que ja existe cadastro desse cpf
        return "CPF JA CADASTRADO";

    
       }else{//se nao tem cadastro

       //fazendo o insert com os dados das variaveis
       $sql = "INSERT INTO clientes(nome,sobrenome,cpf) VALUES ('$nome', '$sobreNome', '$cpf')";
        
       if($this->conexao->execultarQuery($sql)){
        
        //retorna quando cadastra cadastrou
        return "CADASTRADO";
       }
      }
    }

    public function removerCliente($codigo)
    {
        // TODO: Implement removerCliente() method.
        $sql = "DELETE FROM clientes WHERE codigo_cliente = $codigo ";
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

        $sql = "UPDATE clientes SET nome='$nome',sobrenome = '$sobreNome',cpf='$cpf' WHERE codigo_cliente  = '$codigo' ";
        $this->conexao->execultarQuery($sql);
    }
	

	public function listarCliente()
	{
		//obtem a lista de todos os filmes
		$listagem = $this->conexao->execultarQuery("SELECT * FROM clientes"); //aqui ja temos todos os filmes
		//cria um novo array onde guadaremos os filmes
		$arrayCliente = array();
	
		//varre a lista de entrada da tabela filme 
		//cria um novo objeto filme para cada entrada 
		//da tabela

		//AGORA PRECISAMOS SEPARAR OS FILMES ;)
		
		//varrenendo os filmes rececebidos na variavel $listagem
		while ($linha= mysqli_fetch_array($listagem))
		{
			//cada vez que passamos por um registro é criado um novo objeto filme
			$cliente = new Cliente
            (
				$linha['nome'],
				$linha['sobrenome'],
				$linha['cpf'],
				$linha['codigo_cliente']
				
			);
			array_push($arrayCliente,$cliente);
		}

		return $arrayCliente; //retorna um array de um filme
	}


	//listar um cliente pelo codigo
    public function buscarCliente($codigo)
    {
        // TODO: Implement listarCliente() method.
		
		$listagem = $this->conexao->execultarQuery("SELECT * FROM clientes WHERE codigo_cliente = '$codigo'");
		
		while ($linha = mysqli_fetch_array($listagem))
		{
			$Cliente = new Cliente (
			
				$linha['nome'],
				$linha['sobrenome'],
				$linha['cpf'],
				$linha['codigo_cliente']
			);
		
		return $Cliente;
		
		}
    }

    //retornao se encontrou o cpf
    public function pesquisarCpf($cpf){

        $cpfCliente = $this->conexao->execultarQuery("SELECT * FROM clientes WHERE cpf = '$cpf'");
        $cpf =  mysqli_fetch_array($cpfCliente);
        $cpf1 = $cpf['cpf'];
        //retornar
        return $cpf1;

    }

}//final classe

//a classe ja serve uma instancia
$repositorioCliente = new RepositorioCliente();