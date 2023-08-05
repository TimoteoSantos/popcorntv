<?php 

require_once 'Conexao.php';
require_once 'Filmes.php';
require_once 'InterfaceFilmes.php';

//interface para que todo os futuros repositorio
//que venham implementar esse projeto tenham
//os metodos nescessarios para seu funcionamento

//classe repositorio_filmes implemeta a interfacer IRepostorio
class RepositorioFilmesMySQL implements IRepositorioFilmes 
{
	//atributo que guardara a conexao com o banco de dados
	private $conexao;

	//construtor do repositorio filmes
	public function __construct()
	{
		//cria o objeto que sera responsavel pelas chamadas ao banco de dados
		$this->conexao = new Conexao("localhost","root","","popcorntv");
		//conecata ao banco de dados
		if($this->conexao->conectar() == false){
			
			echo "erro" .mysqli_error();
		}
	}

	//cadastrar um novo filme,
	//observar que a sql é preparada e enviada para para o banco
	public function cadastrarFilme($filme)//estamos recebendo um objteo do tipo objeto com dados e funcoes deste objeto
	{
		$titulo = $filme->getTitulo();
		$sinopse = $filme->getSinopse();
		$quantidade = $filme->getQuantidate();
		$trailer = $filme->getTrailer();
		
		$sql = "INSERT INTO filme (titulo,sinopse,quantidade,trailer) VALUE ('$titulo','$sinopse','$quantidade','$trailer')";
		$this->conexao->execultarQuery($sql);
	}

	//remover filme 
	public function removerFilme($codigo)
	{
		$sql = "DELETE FROM  filme WHERE codigo = '$codigo'"; //recebe os comandos em sql e atribui a variavel $sql
		$this->conexao->execultarQuery($sql);//chama o metodo execultarQuery() da classe conexao
	}

	//atualizar filme
	public function atualizarFilme($filme) //recebendo o objeto filme
	{
		$titulo = $filme->getTitulo();
		$codigo = $filme->getCodigo();
		$sinopse = $filme->getSinopse();
		$quantidade = $filme->getQuantidate();
		$trailer = $filme->getTrailer();

		$sql = "UPDATE filme SET titulo = '$titulo', sinopse = '$sinopse', quantidade = '$quantidade', trailer = '$trailer'
		WHERE $codigo = '$codigo'";

		$this->conexao->execultarQuery($sql);
	}

	//buscar um novo filme a partir do seu codigo 
	//observe que é criado um novo filme
	//a partir do que é retornado do banco

	public function buscarFilme($codigo)
	{
		$linha = $this->Conexao->obtemPrimeiroRegistroQuery("SELECT * FROM filme WHERE codigo = '$codigo'");

		//cria um novo objeto com os dados que vieram do banco de dados
		$filme = new Filmes(
			
			$linha['titulo'],
			$linha['codigo'],
			$linha['sinopse'],
			$linha['quantidade'],
			$linha['trailer']

		);
		
		return $filme;
	}

	//listar todos os filmes
	public function getListarFilmes()
	{
		//obtem a lista de todos os filmes
		$listagem = $this->conexao->execultarQuery("SELECT * FROM filmes"); //aqui ja temos todos os filmes
		//cria um novo array onde guadaremos os filmes
		$arrayFimes = array();
	
		//varre a lista de entrada da tabela filme 
		//cria um novo objeto filme para cada entrada 
		//da tabela

		//AGORA PRECISAMOS SEPARAR OS FILMES ;)
		
		//varrenendo os filmes rececebidos na variavel $listagem
		while ($linha= mysqli_fetch_array($listagem))
		{
			//cada vez que passamos por um registro é criado um novo objeto filme
			$filme = new Filmes(
				$linha['titulo'],
				$linha['codigo'],
				$linha['sinopse'],
				$linha['quantidade'],
				$linha['trailer']
			);
			array_push($arrayFimes,$filme);
		}

		return $arrayFimes; //retorna um array de um filme
	}
}
//cria um objeto repositorio de filmes. Esse objeto será 
//acessado pelo restante da aplicação para receber e enviar objetos filmes 
//para o banco de dados
$repositorio = new RepositorioFilmesMySQL();