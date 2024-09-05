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
    <div class="row">
      <div class="col-sm-12">
        <div class="card text-left">
          <div class="card-header">
            Registros de Clientes
          </div>
          <div class="card-body">
            <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
              Agregar nuevo <span class="fa fa-plus-circle"></span>
            </span>
            <hr>
            <div id="tablaDatatable"></div>
          </div>
          <div class="card-footer text-muted">
            Trans Bolivar
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega nuevos Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" onsubmit="return validation()">
          <form id="frmnuevo">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombre" name="nombre" >
            <label>Apellido</label>
            <input type="text" class="form-control input-sm" id="apellido" name="apellido" >
            <label>CI</label>
            <input type="text" class="form-control input-sm" id="ci" name="ci" >
            <label>Nit</label>
            <input type="text" class="form-control input-sm" id="nit" name="nit" >
            <label>Nombre Nit</label>
            <input type="text" class="form-control input-sm" id="nombrenit" name="nombrenit" >
            <label>Telefono</label>
            <input type="text" class="form-control input-sm" id="telefono" name="telefono" >
           
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar juego</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="frmnuevoU">
            <input type="text" hidden="" id="idclientes" name="idclientes">
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" id="nombreu" name="nombreu" >
            <label>Apellido</label>
            <input type="text" class="form-control input-sm" id="apellidou" name="apellidou" >
            <label>CI</label>
            <input type="text" class="form-control input-sm" id="ciu" name="ciu" >
            <label>Nit</label>
            <input type="text" class="form-control input-sm" id="nitu" name="nitu" >
            <label>Nombre Nit</label>
            <input type="text" class="form-control input-sm" id="nombrenitu" name="nombrenitu" >
            <label>Telefono</label>
            <input type="text" class="form-control input-sm" id="telefonou" name="telefonou" >
            
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
        </div>
      </div>
</div>
      </div>

</body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $('#btnAgregarnuevo').click(function(){
      datos=$('#frmnuevo').serialize();

      $.ajax({
        type:"POST",
        data:datos,
        url:"../../modelo/admin/cliente/agregar.php",
        success:function(r){
          if(r==1){
            $('#frmnuevo')[0].reset();
            $('#tablaDatatable').load('Presentacion/tablaclientes.php');
            alertify.success("agregado con exito :D");
          }else{
            alertify.error("Fallo al agregar :(");
          }
        }
      });
    });

    $('#btnActualizar').click(function(){
      datos=$('#frmnuevoU').serialize();

      $.ajax({
        type:"POST",
        data:datos,
       url:"../../modelo/admin/cliente/actualizar.php",
        success:function(r){
          if(r==1){
            $('#tablaDatatable').load('Presentacion/tablaclientes.php');
            alertify.success("Actualizado con exito :D");
          }else{
            alertify.error("Fallo al actualizar :(");
          }
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaDatatable').load('Presentacion/tablaclientes.php');
  });
</script>

<script type="text/javascript">
  function agregaFrmActualizar(idclientes){
    $.ajax({
      type:"POST",
      data:"idclientes=" + idclientes,
    url:"../../modelo/admin/cliente/obtenDatos.php",
      success:function(r){
        datos=jQuery.parseJSON(r);
        $('#idclientes').val(datos['idcliente']);
        $('#nombreu').val(datos['nombre']);
        $('#apellidou').val(datos['apellido']);
        $('#ciu').val(datos['ci']);
        $('#nitu').val(datos['nit']);
        $('#nombrenitu').val(datos['nombrenit']);
        $('#telefonou').val(datos['telefono']);
        
      }
    });
  }

  function eliminarDatos(idclientes){
    alertify.confirm('Eliminar un cliente', '¿Seguro de eliminar este cliente :(?', function(){ 

      $.ajax({
        type:"POST",
        data:"idclientes=" + idclientes,
        url:"../../modelo/admin/cliente/eliminar.php",
        success:function(r){
          if(r==1){
            $('#tablaDatatable').load('Presentacion/bus/tablaclientes.php');
            alertify.success("Eliminado con exito !");
          }else{
            alertify.error("No se pudo eliminar...");
          }
        }
      });

    }
    , function(){

    });
  }
</script>

