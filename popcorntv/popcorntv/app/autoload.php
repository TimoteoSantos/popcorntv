<?php

//criar uma funcao que inclui os arquivos
//TODOS OS ARQUIVOS DENTRO DESSA FUNCAO SERAO ENCHERGADOS PELOS ARQUIVOS QUE INCLUIREM ESSE ARQUIVO

//raiz do projeto onde deixamos neste caso as classes no contexto didatico
function incluirClasses($nomeClasses)
{
        require_once 'Filmes.php';
        require_once 'InterfaceFilmes.php';
        require_once 'Conexao.php';
        require_once 'RepositorioFilmes.php';

}

//funcao que busca as classes da minha funcao incluirClasses()
spl_autoload_register("incluirClasses"); // funcao spl para registro de arquivos de classes podemos ter quantas precisarmos
