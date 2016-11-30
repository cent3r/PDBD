capacitacion<?php

	# conectare la base de datos
    $con=@mysqli_connect('localhost', 'root', '', 'capacitacion');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	/*Inicia validacion del lado del servidor*/
	if (		   empty($_POST['id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre vacío";
		} else if (empty($_POST['curp'])){
			$errors[] = "Curp vacío";
		} else if (empty($_POST['fecha'])){
			$errors[] = "Fecha vacía";
		} else if (empty($_POST['rfc'])){
			$errors[] = "RFC vacío";
		} else if (empty($_POST['sexo'])){
			$errors[] = "Sexo vacío";
		} else if (empty($_POST['tipo'])){
			$errors[] = "Tipo vacío";
		}else if (empty($_POST['Curriculum'])){
			$errors[] = "Tipo Curriculum";
		} else if (empty($_POST['Empresa'])){
			$errors[] = "Tipo Empresa";
		}  
		 else if (
			!empty($_POST['id']) &&
			!empty($_POST['nombre']) && 
			!empty($_POST['curp']) &&
			!empty($_POST['fecha']) &&
			!empty($_POST['rfc']) &&
			!empty($_POST['sexo'])&&
			!empty($_POST['tipo'])&&
			!empty($_POST['Curriculum'])&&
			!empty($_POST['Empresa'])
			
		){

		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$curp=mysqli_real_escape_string($con,(strip_tags($_POST["curp"],ENT_QUOTES)));
		$fecha=mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
		$rfc=mysqli_real_escape_string($con,(strip_tags($_POST["rfc"],ENT_QUOTES)));
		$sexo=mysqli_real_escape_string($con,(strip_tags($_POST["sexo"],ENT_QUOTES)));
		$tipo=mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
		$Curriculum=mysqli_real_escape_string($con,(strip_tags($_POST["Curriculum"],ENT_QUOTES)));
		$Empresa=mysqli_real_escape_string($con,(strip_tags($_POST["Empresa"],ENT_QUOTES)));
		$id=intval($_POST['id']);
		
		$sql="UPDATE personas SET  Nombre='".$nombre."', CURP='".$curp."',
		FechaNac='".$fecha."', RFC='".$rfc."', Sexo='".$sexo."'	WHERE Id='".$id."'";
		
		$sql1="UPDATE capacitacion SET  Curriculum='".$Curriculum."', Empresa='".$Empresa."'";
		
		$query_update = mysqli_query($con,$sql);
		$query_update = mysqli_query($con,$sql1);
			if ($query_update){
				$messages[] = "Los datos han sido actualizados satisfactoriamente.";
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