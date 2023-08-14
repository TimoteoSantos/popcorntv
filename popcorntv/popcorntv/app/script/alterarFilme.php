<?php

require_once '../Filmes.php';
require_once'../RepositorioFilmes.php';

//cria um objeto filmesRecebidos() com as entradas recebidas pelo usuario
$filmesRecebidos = new Filmes($_REQUEST['titulo'],$_REQUEST['codigo'],$_REQUEST['sinopse'],$_REQUEST['quantidade'],$_REQUEST['trailer']);

//envia esse objeto com os dados recebidos para o $repostirio->atualizarFilme($objeto) que espera um objeto
$repositorio->atualizarFilme($filmesRecebidos);

//retorna para index
header('Location: ../../index.php');
exit;