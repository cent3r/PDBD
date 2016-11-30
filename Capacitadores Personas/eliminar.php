<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'capacitacion');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	 if (empty($_POST['id_persona'])){
			$errors[] = "ID vacío";
		}   else if (
			!empty($_POST['id_persona']) 
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_persona=intval($_POST['id_persona']);
		
//		$sql="DELETE FROM personas WHERE id='".$id_pais."'";
		$sql="UPDATE personas SET Estatus = 'Suspendido' WHERE id='".$id_persona."'";
		$sql1="UPDATE capacitadores SET Estatus = 'Suspendido' WHERE id='".$id_persona."'";
		$query_delete = mysqli_query($con,$sql);
		$query_delete = mysqli_query($con,$sql1);
			if ($query_delete){
				$messages[] = "Los datos han sido eliminados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	