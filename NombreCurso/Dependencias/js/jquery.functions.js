	function ActualizarDatos(){
		var dep_id = $('#dep_id').attr('value');
		var Nomb = $('#Nomb').attr('value');
		

		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&Nomb="+Nomb,
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
	
	function EliminarDato(dep_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "id="+dep_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+dep_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var Nomb = $('#Nomb').attr('value');
		

		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data: "submit=&Nomb="+Nomb,
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
	
	

	