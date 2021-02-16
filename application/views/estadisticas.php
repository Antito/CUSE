<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Estadisticas</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    	<div class="row">
          <div class="col-md-8 col-md-offset-1">
     			
								  	<?php $mes_actual=0 ?>
									 <?php if($insumos){
										
													
										foreach($insumos as $in){ 
							  				if (($rol=="A") or $in["usuario_id"] == $usuario_id) { ?> 
								  		<?php $pepe=date("m",strtotime($in["fecha"])); ?>
								  		<?php if($mes_actual != $pepe)
										{
											$mes_actual= date("m",strtotime($in["fecha"]));
											
											switch($mes_actual)
											{
												case 1:
														?>	<li><?php echo "Enero"; ?> </li><?php 
													break;
												case 2:
														?>	<li><?php echo "Febrero"; ?> </li><?php 
													break;
												case 3:
														?>	<li><?php echo "Marzo"; ?> </li><?php 
													break;
												case 4:
														?>	<li><?php echo "Abril"; ?> </li><?php 
													break;
												case 5:
														?>	<li><?php echo "Mayo"; ?> </li><?php 
													break;
												case 6:
														?>	<li><?php echo "Junio"; ?> </li><?php 
													break;
												case 7:
														?>	<li><?php echo "Julio"; ?> </li><?php 
													break;
												case 8:
														?>	<li><?php echo "Agosto"; ?> </li><?php 
													break;
												case 9:
														?>	<li><?php echo "Septiembre"; ?> </li><?php 
													break;
												case 10:
														?>	<li><?php echo "Octubre"; ?> </li><?php 
													break;
												case 11:
														?>	<li><?php echo "Noviembre"; ?> </li><?php 
													break;
												case 12:
													?>	<li><?php echo "Diciembre"; ?> </li><?php 
													break;
											}
										}
										 ?>
			  							
								  	
								  		<ul>
										  <li><?php echo $in["nombre"] ?> - <?php echo $in["cantidad"] ?></li>
										  
										  
										</ul>
											
                                
                                 	
		   							
								<?php  } } }  ?>
                                
                            
     		
			</div>
		</div>
	  </div>
	  
    
    
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>