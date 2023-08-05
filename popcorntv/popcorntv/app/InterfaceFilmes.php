<?php

interface IRepositorioFilmes
{
	public function cadastrarFilme($filme);
	public function removerFilme($filme);
	public function atualizarFilme($filme);
	public function buscarFilme($filme);
	public function getListarFilmes();
}