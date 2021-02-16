<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registrar usuario</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css">
	  
		body {
			min-width: 0;
			max-width: 100%;
			background-color: darkgray ;
		}
		
	</style>
    
  </head>
  <body>
   
    <div class="container">
   		<div class="row">
   			<div class="col-md-6 col-md-offset-3">
       		<p>&nbsp;</p>
        		<div class="panel panel-info">
           		   <div class="panel-heading">Registrar Usuario</div>
            		<div class="panel-body">
						<form class="form-horizontal" method="post" action="<?php echo site_url("usuarios_controller/agregar"); ?>">
							<fieldset>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="usuario">Usuario:</label>  
							  <div class="col-md-4">
							  <input id="usuario" name="usuario" type="text" placeholder="" class="form-control input-md" required="">

							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="password">Password:</label>
							  <div class="col-md-4">
								<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

							  </div>
							</div>
							
							<!-- Select Basic -->
					  	 	<div class="form-group">
							 <label class="col-md-4 control-label" for="rol">Rol:</label>
							  <div class="col-md-4">
								<select id="rol" name="rol" class="form-control">
									<option value="U">Seleccionar</option>
									<option value="A">A</option>
									<option value="U">U</option>

								</select>
							  </div>
							</div>
							
							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="btnEntrar"></label>
							  <div class="col-md-4" align="right">
								<button id="btnEntrar" name="btnEntrar" class="btn btn-info">Guardar</button>
							  </div>
							</div>

							</fieldset>
						</form>
					</div>
				</div>
			</div>
   		</div>
   		
   		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="info">
							<th>Usuario</th>
							<th>Rol</th>
							<th>Estado</th>
							<th>Borrar</th>
							<th>Ultimo login</th>
							
							
						<tr>
					</thead>
					<tbody>
						 <?php if($usuarios){
									foreach($usuarios as $u){ ?>
						<tr>
							<td><?php echo $u["usuario"]; ?></td>
							<td><?php echo $u["rol"]; ?></td>
							<td><?php if ($u["activo"] == 1) { ?>
							<a class="text-danger" href="<?php if($u["usuario"]!= $usuario){ echo site_url("usuarios_controller/desactivar/".$u["usuario_id"]); }?>">Desactivar</a>
							<?php }else { ?>
										<a class="text-success" href="<?php if($u["usuario"]!= $usuario){ echo site_url("usuarios_controller/activar/".$u["usuario_id"]);} ?>">Activar</a>
							<?php } ?></td>
							
							 <td align="center"><a href="<?php echo site_url("usuarios_controller/borrar/".$u["usuario_id"]);?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
							 
							 <td><?php echo $u["ult_login"]; ?></td>
							

							
						</tr>
						<?php } } ?>
					</tbody>

				</table>
			</div>
		</div>
   		
   </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>