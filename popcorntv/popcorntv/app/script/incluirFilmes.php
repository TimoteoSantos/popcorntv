<?php

require_once '../RepositorioFilmes.php';

//estamos instanciando a classe filme que esta requerida em repositorio e ja tem um objeto criado em filmes.php
//criando o objeto $filmesRecebidos passando pra ele o que recebemos via post
$filmesRecebidos = new Filmes($_POST['titulo'],null,$_POST['sinopse'],$_POST['quantidade'],$_POST['trailer']);

$repositorio->cadastrarFilme($filmesRecebidos);

var_dump($filmesRecebidos);

header('Location: ../../index.php');