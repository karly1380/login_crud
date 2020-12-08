<?php 
require_once "../clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$sql="SELECT id_gasto,cont,precio,fecha 
from t_registro";
$result=mysqli_query($conexion,$sql);

?>


<div>
	<table class="table table-hover table-condensed table-border" id="iddatatable">
		<thead style="background-color: #FF00FF;color: black;font-weight: bold;">
			<tr>
				<td>Concepto</td>
				<td>Precio</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #00FFFF;color: black; font-weight: : bold;">
			<tr>
				<td>Concepto</td>
				<td>Precio</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody style="background-color: pink">
			<?php 

			while ($mostrar=mysqli_fetch_row($result)){ 
				?>
				<tr>
					<td><?php echo $mostrar[1]?></td>
					<td><?php echo $mostrar[2]?></td>
					<td><?php echo $mostrar[3]?></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil-square-o"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
	<a href="../procesos/salir.php">Salir</a>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#iddatatable').DataTable();
	});
</script>