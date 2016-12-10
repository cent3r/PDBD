	function ActualizarDatos(){
		var ar_id = $('#ar_id').attr('value');
		var IdDependencia = $('#IdDependencia').attr('value');
		var Nombre = $('#Nombre').attr('value'); 
		
		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&IdDependencia="+IdDependencia+"&Nombre="+Nombre+"&ar_id="+ar_id,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}
	
	function ConsultaDatos(){
		$.ajax({
			url: 'consulta.php',
			cache: false,
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function EliminarDato(ar_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "Id="+ar_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+ar_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var IdDependencia = $('#IdDependencia').attr('value');
		var Nombre = $('#Nombre').attr('value'); 
		
		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&IdDependencia="+IdDependencia+"&Nombre="+Nombre,
			success: function(datos){
				ConsultaDatos();
				alert(datos);
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}

	function Cancelar(){
		$("#formulario").hide();
		$("#tabla").show();
		return false;
	}
	
	
	