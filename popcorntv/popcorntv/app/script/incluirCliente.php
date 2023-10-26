<?php

//requere o repositorio responsavel pela manipulacao dos dados no banco
require_once '../RepositorioCliente.php';

//instacia um objeto da classe cliente com os dados recebidos os dados recebidos sao os dados do novo objeto
$clientes = new Cliente($_POST['nome'],$_POST['sobrenome'],$_POST['cpf']);

/*

com esse novo objeto que contem os dados recebidos invocamos o metodo da classe Cliente responsavel por gravar o novo cliente
esse metodo espera receber um objeto com os dados
*/

 $retorno = $repositorioCliente->cadastrarCliente($clientes);

//retorna para a pagina cliente
header('Location: ../../cliente.php?retorno=' . $retorno);

