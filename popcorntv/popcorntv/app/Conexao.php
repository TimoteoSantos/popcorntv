<?php

//classe conexao mysql
class Conexao
{
	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;

	//metodo construtor inicaliza os metodos ao instanciar a classe conexao
	public function __construct($host,$usuario,$senha,$banco){

		//enviado os dados para os metodos do objeto
		$this->host = $host;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->banco = $banco;
	}

	public function conectar(){
		//insere dentro do atributo conexao uma conexao 
		//passando os dados para o mysqli_conect que é uma funcao de conexao com os argumentos do acesso ao banco
		$this->conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->banco);

	if(mysqli_connect_errno($this->conexao)){//testando se conectou
		
		return false;
	
	}else{
			//se conseguir conectar ao mysql seta o banco para usar utf8
			mysqli_query($this->conexao, "SET NAMES 'utf-8';");
			return true; //retorna verdadeiro a conexao
		}
	}

	//funcao para realizar buscas no banco de dados
	function execultarQuery($sql){
		return mysqli_query($this->conexao,$sql);
	}

	//funcao para execultar uma consulta e opter o primeiro dado
	function obtemPrimeiroResistroQuery($query){
		
		//enviamos o pedido pela conexao e guardamos a respota em linha;
		$linha = $this->execultarQuery($query);
		//retorna a primeira linha
		return mysqli_fetch_array($linha);
		
		
	}

}
