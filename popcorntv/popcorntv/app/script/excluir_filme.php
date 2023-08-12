<?php
//requerendo o repositorio
require_once '../RepositorioFilmes.php';

//passando para o metodo remorefilme do objeto $repositorio o codigo do filme
$repositorio->removerFilme($_REQUEST['codigo']);

//voltando para a index
header ('Location: ../../index.php');
//parando a execulção
exit;