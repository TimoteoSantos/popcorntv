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

            <?php require_once 'nav.php'; ?>

            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">

                        <!-- content -->
                        <div class="col-sm-12" id="featured">
                          <div class="page-header text-muted">locacao</div>


                          <form action ="" method='post' class="form-horizontal">


						  <input type="hidden" name="codigo" value="" />
							<fieldset>

							<!-- Form Name -->
							<legend>Incluir</legend>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="locacao">locacao</label>
							  <div class="controls">


							    <input id="locacao" name="nome" type="text" value="" />

							  </div>
							</div>


							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="quantidade">Quantidade</label>
							  <div class="controls">
							    <input id="cartaz" name="sobrenome" type="text" placeholder="" class="input-xxlarge" >

							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="trailer">Trailer</label>
							  <div class="controls">
							    <input id="trailer" name="cpf" type="number" placeholder="" class="input-xxlarge" >

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

                        		<th>nome</th>
								<th>sobrenome</th>
								<th>cpf</th>
                                <th>excluir</th>
                                <th>alterar</th>
                        	</tr>

                            <tr>
             					<td class="col-md-6">timoteo</td>
                                <td class="col-md-6">santos</td>
                                <td class="col-md-6">0969</td>
                                <td class="col-md-1"><a class="btn btn-danger" href="#" role="button">Excluir</a></td>
                                <td class="col-md-1"><a class="btn btn-default" href=""# role="button">Alterar</a></td>


                            </tr>

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