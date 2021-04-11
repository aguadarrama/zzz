<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script src="https://apis.google.com/js/api.js" type="text/javascript"></script>

	<script src="inputControl-1.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>


	<title>

	</title>
	<script type="text/javascript">

		$('document').ready(function(){
			$('input[restrict="N"]').attr("data-restrict", "0123456789");
		})

		function fnSearchSector(){
			var cp = $("#cp").val();
			$.get("sepomex.php",{cp:cp},function(data){
				dataJ = JSON.parse(data);
				$("#colonia").empty();
				$("#colonia").append('<option value="0">Seleccionar Colonia</option>');
				$("#colonia").attr("disabled","disabled");
				if(parseInt(dataJ.code_error)==0){
					// +CODIGO EXISTE ------------
					$("#municipality").val(dataJ.response.municipio);
					$("#city").val(dataJ.response.ciudad);
					$("#state").val(dataJ.response.estado);
					$("#country").val(dataJ.response.pais);
					for(var i in dataJ.response.asentamiento){
						$("#colonia").append("<option value='"+dataJ.response.asentamiento[i]+"'>"+dataJ.response.asentamiento[i]+"</option>");
					}
					$("#colonia").removeAttr("disabled");
					$("#btn-calc").removeAttr("disabled");
				}else{
					// -CODIGO NO EXISTE ---------
					bootbox.alert("El Codigo Postal NO existe!");
					$("#btn-calc").attr("disabled","disabled");
				}
			})
		}

		function fnAbc(){
			$("#spin").show();
			let code = $("#cp").val();
			let suburb = $("#colonia").val();
			let municipality = $("#municipality").val();
			let city = $("#city").val();
			var state = $("#state").val();
			$("#grid-distance").load("curl.google.api.php",{"state":state,"city":city,"municipality":municipality,"suburb":suburb,"code":code},function(){
				$("#spin").hide();
			});
		}

		var tmp = "";

		function fnInputLen(){
			if($("#cp").val().length==5){
				$("#searchCP").removeAttr("disabled");
			}else{
				$("#searchCP").attr("disabled","disable");
			}
		}
	</script>
	<style type="text/css">
		*{
			font-family: 'Quicksand', sans-serif;
		}
		label{
			font-size: 0.75rem;
			font-weight: 500;
			margin-bottom: 0px;
		}
		input.form-control{
			hxeight: 20px;
		}
		.table th{
			font-size: 0.8rem;
		}
		.table td{
			font-weight: 400;
			font-size: 0.9rem;
		}
		.btn:disabled{
			opacity:20%;
		}
	</style>
</head>	
<body>
	<div class="container">
		<h4>Busqueda de Instructor</h4>
		<div class="row">
			<div class="col-6">
				<label for="cp">Codigo Postal</label>
				<input type="text" name="cp" id="cp" class="form-control" value="" onkeyup="fnInputLen();" maxlength="5" restrict="N">
			</div>
			<div class="col-6">
				<label class=""></label>
				<button id="searchCP" class="btn btn-primary col-3" onclick="fnSearchSector();" style="display: block;" disabled="">Buscar</button>
			</div>
		</div>

		<label>Colonia</label>
		<select id="colonia" name="colonia" class="form-control" disabled="disabled">
			<option value="0">Seleccionar Colonia</option>
		</select>


		<div class="row">
			<div class="col-4">
				<label>Municipio</label>
				<input type="" name="" id="municipality" value="" class="form-control" disabled="">
				<input type="hidden" id="city">
			</div>

			<div class="col-4">
				<label>Estado</label>
				<input type="" name="" id="state" value="" class="form-control" disabled="">
			</div>

			<div class="col-4">
				<label>País</label>
				<input type="" name="" id="country" value="" class="form-control" disabled="">
			</div>
		</div>
		<!--<input type="" name="" id="origins" value="" class="form-control">-->

		<!--<input type="" name="" id="destinations" value="saltillo">-->
		<div class="row">
			<div class="col-4">
				<button id="btn-calc" type="button" onclick="fnAbc();" class="btn btn-primary col-12" style="margin-top: 20px; margin-bottom: 20px;" disabled="">Calcular</button>
			</div>
		</div>

<!--
		<div class="card col-4" style="margin-left: auto;margin-right: auto;">
			<div class="card-body">
				<label>Distancia:</label>
				<input type="" name="" id="distance" disabled="" style="text-align: right;" class="form-control">
				<label>Tiempo:</label>
				<input type="" name="" id="duration" disabled="" style="text-align: right;" class="form-control">
			</div>
		</div>
	-->
	<div id="spin" class="spinner-border" role="status" style="display: none;">
		<span class="sr-only">Loading...</span>
	</div>
	<div id="grid-distance">


	</div>



</div>
</body>
</html>


	<!--
	dicilio del ultimo cursor
	<input type="" name="dom_ultimo" value="https://maps.googleapis.com/maps/api/distancematrix/json?origins=405%20arcos%20historicos,arcos%20del%20sol,monterrey,%20mexico&destinations=Saltillo,%20mexico&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A">
-->