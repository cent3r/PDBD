	function ActualizarDatos(){
		var cap_id = $('#cap_id').attr('value');
		var Nombre = $('#Nombre').attr('value');
		var CURP = $('#CURP').attr('value');
		var FechaNac = $('#FechaNac').attr('value');
		var RFC = $('#RFC').attr('value');
		var Sexo = $('#Sexo').attr('value');
		var Curriculum = $('#Curriculum').attr('value');
		var Empresa= $('#Empresa').attr('value');
		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&Nombre="+Nombre+"&CURP="+CURP+"&FechaNac="+FechaNac+"&RFC ="+RFC +"&Sexo="+Sexo+"&Curriculum="+Curriculum+"&Empresa="+Empresa+"&cap_id="+cap_id,
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
	
	function EliminarDato(cap_id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "Id="+cap_id,
				success: function(datos){
					alert(datos);
					$("#fila-"+cap_id).remove();
				}
			});
		}
		return false;
	}
	
	function GrabarDatos(){
		var Nombre = $('#Nombre').attr('value');
		var CURP = $('#CURP').attr('value');
		var FechaNac = $('#FechaNac').attr('value');
		var RFC = $('#RFC').attr('value');
		var Sexo = $('#Sexo').attr('value');
		var Curriculum = $('#Curriculum').attr('value');
		var Empresa= $('#Empresa').attr('value');
		
		$.ajax({
			url: 'nuevo.php',
			type: "POST",
			data:  "submit=&Nombre="+Nombre+"&CURP="+CURP+"&FechaNac="+FechaNac+"&RFC ="+RFC +"&Sexo="+Sexo+"&Curriculum="+Curriculum+"&Empresa="+Empresa,
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
	
	
	