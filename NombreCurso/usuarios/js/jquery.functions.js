	function ActualizarDatos(){
		var us_id = $('#us_id').attr('value');
		var Correo = $('#Correo').attr('value');
		var Password = $('#Password').attr('value'); 
		var NivelUS = $('#NivelUS').attr('value');
		var Id__Persna = $('#Id__Persna').attr('value'); 
		var TipoUS = $('#TipoUS').attr('value'); 
		
		$.ajax({
			url: 'actualizarAr.php',
			type: "POST",
			data: "submit=&Correo="+Correo+"Password="+Password+"NivelUS="+NivelUS+"Id__Persna="+Id__Persna+"TipoUS="+TipoUS+"&us_id="+us_id,
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
			url: 'consultaAr.php',
			cache: false,
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function EliminarDato(us_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "ID="+us_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+us_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var Correo = $('#Correo').attr('value');
		var Password = $('#Password').attr('value'); 
		var NivelUS = $('#NivelUS').attr('value');
		var Id__Persna = $('#Id__Persna').attr('value'); 
		var TipoUS = $('#TipoUS').attr('value');
		
		$.ajax({
			url: 'nuevoAr.php',
			type: "POST",
			data: "submit=&Correo="+Correo+"Password="+Password+"NivelUS="+NivelUS+"Id__Persna="+Id__Persna+"TipoUS="+TipoUS,
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
	
	
	