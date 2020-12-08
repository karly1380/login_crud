<!DOCTYPE html>
<html>
<head>
	<title>Login y Crud</title>
	<?php  require_once "script.php"; ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<center>
						<div class="card-header">
						B I E N V E N I D O   !! :D
					</div>
				</center>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar  <span class="fa fa-plus-circle"></span>
					</span>
					<hr>
					<div id="tablaDatatable"></div>
				</div>
				<div class="card-footer text-muted">
					Por Karla Denisse Caudillo Cortes 
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmnuevo">
					<label>Cont</label>
					<input type="text" class="form-control input-sm" id="cont" name="cont">
					<label>Precio</label>
					<input type="text" class="form-control input-sm" id="precio" name="precio">
					<label>Fecha</label>
					<input type="text" class="form-control input-sm" id="fecha" name="fecha">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar </button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmnuevoU">
					<input type="text" hidden="" id="idgasto" name="idgasto">
					<label>Cont</label>
					<input type="text" class="form-control input-sm" id="contU" name="contU">
					<label>Precio</label>
					<input type="text" class="form-control input-sm" id="precioU" name="precioU">
					<label>Fecha</label>
					<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
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
				url:"../procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Se agrego con Exito! :D ");
					}else{
						alertify.error("Error al Ingresar :O");
					}
				}
			});

		});

		$('#btnActualizar').click(function(){

			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/actualizar.php",
				success:function(r){
					if(r==1){
						
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Se actualizo con Exito!! :D");
					}else{
						alertify.error("Error No se pudo Actualizar :(");
					}
				}
			});


		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto=" + idgasto,
			url:"../procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#contU').val(datos['cont']);
				$('#precioU').val(datos['precio']);
				$('#fechaU').val(datos['fecha']);

			}
		});
	}

	function eliminarDatos(idgasto){
		alertify.confirm('Eliminar un contenido', '¿Seguro de eliminar este contenido ?',function(){ 

			$.ajax({
				type:"POST",
				data:"idgasto=" + idgasto,
				url:"../procesos/eliminar.php",
				success:function(r){
					console.log(r);
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Se elimino!");
					}else{
						alertify.error("No se pudo Eliminar, intenta despues...");
					}
				}
			})
		}
		, function(){

		});
	}

</script>