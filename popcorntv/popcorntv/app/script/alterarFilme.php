<?php

require_once '../Filmes.php';
//require_once '../../autoload.php';

//cria um objeto filme com as entradas recebidas pelo usuario
$filmesRecebidos = new Filmes($_REQUEST['titulo'],$_REQUEST['codigo'],$_REQUEST['sinopse'],$_REQUEST['quantidade'],$_REQUEST['trailer']);

//usa o bjeto repositorio para atualizar o filme
$repositorio->atualizarFilme($filmesRecebidos);

//retorna para index
header('Location: index.php');
exit;