<?php
	require 'app/RepositorioFilmes.php'; //ao requerer o repositorio ja é instaciada a classe porque dentro do repositorio ela foi instaciada
	$filmes = $repositorio->getListarFilmes();//acessa todos os filmes cadastrados e atribui em $filmes
	/*
		aqui temos uma variavel que contem o endereco do arquivo que o formulario ira enviar
		quando criamos essa variavel ela possui o endereco padrao que é o endereco de INCLUSAO DE FILMES

		se ouver um codigo no get iremos entrar dentro de um IF  onde alteramos o edereco do envio para ALTERAR o filme
		porque se tem get veio do proprio formulario nao é um formulario novo
	*/
		//variavel que recebe o endereco padrao
		$destino = 'app/script/incluirFilme.php'; //arquivo para incluir

	//verifica se existe filme no get
	if(isset($_GET['codigo']))
	{//se existir get codigo

		//variavel que recebe o endereco quando existe codigo no get
		$destino = 'app/script/alterarFilme.php'; //arquivo para alterar

		//atrimui a $codigo o codigo do get
		$codigo = $_GET['codigo'];

		/*busca o objeto filme relativo ao codigo enviado por parametro 
		observe que estamos criando um novo objeto $filme porque ao enviar via parametro o codigo do filme
		a classe repositorio pega esse codigo envia para o banco busca os dados desse fime cria um novo objeto com esses dados
		e nos retorna um novo objeto com esses dados  arquivo RepositorioFilmes.php pode ser observado
		*/
		$filme = $repositorio->buscarFilme($codigo); //aqui recebemos um novo objeto com os dados do codigo enviado
		/*
		para que o repositorio altere o filme ele ira precisar do codigo porem no formulario nao temos o campo onde informamos o codigo 
		para que possamos enviar via para o arquivo app/script/alterarFilme.php 
		nesse caso precisaremos criar um campo oculto que recebelera o codigo do filme que estamos alterando ao enviarmos para o arquivo 
		app/script/alterarFilme.php entaremos enviando tambem o codigo do filme em um campo oculto do html - type = hidden		
		*/
		$campoCodigo = '<input type="hidden" name="codigo" value="'. $codigo.'" />';


		// ESTA FALTANDO A PARTE DE IMPLEMENTAR NO HTML AS REGRAS DE ALTERAR FILME

	}//senao ignora

	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Popcorn TV</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row">  	
        	
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar">
                <a class="logo" href="#"><span>Popcorn TV</span></a>
                <ul class="nav">
                    <li class="active"><a href="index.php">Filmes</a>
                    </li>
                    <li><a href="#">Clientes</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>Popcorn TV</h3>Feito para o EAD Pernambuco.</a>
                    </li>
                </ul>
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">Filmes</div>
                          <form action ='app/script/incluirFilmes.php' method='post' class="form-horizontal">
							<fieldset>
							
							<!-- Form Name -->
							<legend>Incluir</legend>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="filme">Filme</label>
							  <div class="controls">
							    <input id="filme" name="titulo" type="text" />
							    
							  </div>
							</div>
							
							<!-- Textarea -->
							<div class="control-group">
							  <label class="control-label" for="sinopse">Sinopse</label>
							  <div class="controls">                     
							    <textarea id="sinopse" name="sinopse"></textarea>
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="quantidade">Quantidade</label>
							  <div class="controls">
							    <input id="cartaz" name="quantidade" type="text" placeholder="" class="input-xxlarge">
							    
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="trailer">Trailer</label>
							  <div class="controls">
							    <input id="trailer" name="trailer" type="text" placeholder="" class="input-xxlarge">
							    
							  </div>
							</div>
							
							<!-- Button -->
							<div class="control-group">
							  <label class="control-label" for=""></label>
							  <div class="controls">
							    <input type="submit" class="btn btn-inverse" value="Enviar" />
							  </div>
							</div>
							
							</fieldset>
							</form>
                        </div>
                       
                        <!--/top story-->
                       
                        <div class="col-sm-12" id="stories">  
                          <div class="page-header text-muted divider">
                            DVDs Cadastrados
                          </div>
                        </div>
                        
                        <table class="table table-hover">
                        	<tr>
                        		<th></th>
                        		<th>Filme</th>
								<th>Sinopse</th>
								<th>Quantidade</th>
								<th>Trailer </th>
                        		<th></th>
                        	</tr>
							

								<?php while ($filmeTemporario = array_shift($filmes)) {
								?>

                        	<tr>
                        		<td class="col-md-1"><a class="btn btn-default" href="#" role="button">Alterar</a></td>
                        		<td class="col-md-6"><?php echo $filmeTemporario->getTitulo() ?></td>
								<td class="col-md-6"><?php echo $filmeTemporario->getSinopse() ?></td>
								<td class="col-md-6"><?php echo $filmeTemporario->getQuantidade() ?></td>								
								<td class="col-md-6"><?php echo $filmeTemporario->getTrailer() ?></td>

                        		<td class="col-md-1"><a class="btn btn-danger" href="app/script/excluir_filme.php?codigo=<?=$filmeTemporario->getCodigo(); ?>" role="button">Excluir</a></td>

                        	</tr>

							<?php } ?>
                        	
						</table>
                      
                        
                        <hr>
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="#" class="pull-right">©Copyright Inc.</a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h3 class="text-center">
                      <a href="#" target="ext">EAD Pernambuco</a>
                      </h3>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>