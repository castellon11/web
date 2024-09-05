<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "scripts.php";  ?>
    
    <link rel="stylesheet" href="css/estilos.css">
    	<link rel="stylesheet" href="css/main.css">
</head>
<body>
    
    <header>
	<header class="default-header">
					<nav class="navbar navbar-expand-lg  navbar-light">
						<div class="container">
							  <a class="navbar-brand" href="index.html">
							  	<img src="img/logo.png" alt="">
							  </a>
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="text-white lnr lnr-menu"></span>
							  </button>

							  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
							    <ul class="navbar-nav">
									<li><a href="index.html#home">Inicio</a></li>
									<li><a href="index.html#about">About</a></li>									
									<li><a href="index.html#secvice">Service</a></li>
									<li><a href="index.html#gallery">Gallery</a></li>
									<li><a href="index.html#faq">Faq</a></li>
									<li><a href="index.html#contact">Contact</a></li>
									<!-- Dropdown -->
								    <li class="dropdown">
								      <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Encomienda
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="RegistroCliente.php">Registro de Cliente</a>
								        <a class="dropdown-item" href="Envio.php">Registro de Encomienda</a>
								      </div>
								    </li>
							    </ul>
							  </div>						
						</div>
					</nav>
				</header>
</header>
    <br>
    
    <br><br>
    <!--registro-->
<div class="container">
		 <h1>Registro de la Encomienda</h1> <br><br><br>
		 <div class="row">
		 	<div class="col-sm-12">
                <span class="btn btn-default" id="ventaProductosBtn"><b>Registrar Encomienda</b></span>
                <span class="btn btn-default" id="ventasHechasBtn"><b>Encomiendas Realizadas</b></span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="ventaProductos"></div>
		 		<div id="ventasHechas"></div>
		 	</div>
		 </div>
	</div>
  <!-- Modal -->
 

  <!-- Modal -->


</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#ventaProductosBtn').click(function(){
				esconderSeccionVenta();
				$('#ventaProductos').load('Envio/Registro.php');
				$('#ventaProductos').show();
			});
			$('#ventasHechasBtn').click(function(){
				esconderSeccionVenta();
				$('#ventasHechas').load('Presentacion/tablaenvio.php');
				$('#ventasHechas').show();
			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventasHechas').hide();
		}

	</script>
