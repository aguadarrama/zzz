<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
<!--
<script src="https://apis.google.com/js/api.js" type="text/javascript"></script>
-->
<title>

</title>
<script type="text/javascript">
	function fnSearchSector(){
		var endpoint_sepomex  = "https://cors-anywhere.herokuapp.com/http://api-sepomex.hckdrk.mx/query/";
		var method_sepomex = 'info_cp/';
		//var cp = "64102";
		var cp = $("#cp").val();
		var variable_string = '?type=simplified&token=94a5eaf0-8cf7-4498-bd9e-de43563a98dd';
		var urls = endpoint_sepomex + method_sepomex + cp + variable_string;
		$.get(urls,function(data){
			console.log(data);

			console.log(data.response.ciudad);
			console.log(data.response.cp);
			console.log(data.response.estado);
			console.log(data.response.municipio);
			console.log(data.response.pais);

			$("#state").val(data.response.estado);
			$("#city").val(data.response.ciudad);
			$("#country").val(data.response.pais);



			//console.log(data.response.asentamiento);
			for(var i in data.response.asentamiento){
				//console.log(i);
				//console.log(data.response.asentamiento[i]);
				//$().append(data.response.asentamiento[1])
				$("#colonia").append("<option value='"+data.response.asentamiento[i]+"'>"+data.response.asentamiento[i]+"</option>");
			}
			$("#colonia").removeAttr("disabled");
		})
	}




	function fnAbc(){



/*
$.get(url){
	.done(function( data ) {
		var content = JSON.parse(data);
		
		if((content[0].error){
			console.log('Algo salio mal');
		}else{
			console.log('Todo bien');
		}
  });
}

*/



			//$.getJSON("https://maps.googleapis.com/maps/api/distancematrix/json",{"origins":"Monterrey, Mexico","destinations":"Saltillo, mexico","mode":"driving","language":"es-419","key":"AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A"},function(abc){
//console.log(abc);
			//})
/*
$.ajax({
            url: "https://maps.googleapis.com/maps/api/distancematrix/json?origins=405 arcos historicos,arcos del sol,monterrey, mexico&destinations=Saltillo, mexico&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A", 
            type: "GET",
            dataType: 'jsonp',
            cache: false,
            success: function(response){                          
                //alert(response);
                console.log(response);
            }           
        });  
        */


/*
var restRequest = gapi.client.request({
  'path': 'https://people.googleapis.com/v1/people/me/connections',
  'params': {'sortOrder': 'LAST_NAME_ASCENDING'}
});

console.log(restRequest);
*/
//var origins = "monterrey";
//var destinations = "saltillo";

var origins = $("#origins").val();

var origins = encodeURI($("#colonia").val()+","+$("#city").val()+","+$("#state").val()+","+$("#country").val());
//var destinations = $("#destinations").val();
var destinations = encodeURI($("#cursos").val());

console.log(origins);
console.log(destinations);


const proxyurl = "https://cors-anywhere.herokuapp.com/";
const url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins="+origins+"&destinations="+destinations+"&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A"; // site that doesn’t send Access-Control-*
fetch(proxyurl + url) // https://cors-anywhere.herokuapp.com/https://example.com
.then(
	response => response.json()
	)
.then(function(contents){
	console.log(contents);
/*
	for(var i in contents){
		console.log(i);
		//for(var a in i){
		//	console.log(a);
		//}
	}
	console.log(contents['rows']);
	console.log(contents['rows'][0].elements[0].distance.value);
	console.log(contents['rows'][0].elements[0].duration.value);
	*/
	let distance = (contents['rows'][0].elements[0].distance.value/1000).toString();
	let duration = contents['rows'][0].elements[0].duration.value/60/60;

	$("#distance").val(distance);
	$("#duration").val(parseFloat(duration.toFixed(2)));
	//console.log(contents['rows']['elements']);
})
//.then(contents => console.log(contents))
.catch(() => console.log("Can’t access " + url + " response. Blocked by browser?"))




//const proxyurl = "https://cors-anywhere.herokuapp.com/";
//const url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=monterrey&destinations=Saltillo&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A"; // site that doesn’t send Access-Control-*

// url (required), options (optional)
/*
fetch(proxyurl + url, {
	method: 'get'
}).then(function(response) {
	let json = response.json();
	console.log(json);
	console.log(json.PromiseResult);
for (var i in json){
	console.log(i);
	if (json.hasOwnProperty(i)) {
    // Mostrando en pantalla la clave junto a su valor
    //alert("La clave es " + clave+ " y el valor es " + json[clave]);
    console.log(i);
  }
}




}).catch(function(err) {
 console.log(err);	// Error :(
});

*/


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
</style>
</head>	
<body>
	<div class="container">
		<h3>Domicilio del Cliente</h3>


		<select id="cursos" class="form-control">
			<option value="Villa Cumbres,Monterrey,Nuevo León">Juan Martinez Perez - Curso 22</option>
		</select>





		<div class="row">
			<div class="col-6">
				<label for="cp">Codigo Postal</label>
				<input type="number" name="cp" id="cp" class="form-control" value="">
			</div>
			<div class="col-6">
				<label class=""></label>
				<button class="btn btn-primary col-3" onclick="fnSearchSector();" style="display: block;">Buscar</button>
			</div>
		</div>

		<label>Colonia</label>
		<select id="colonia" name="colonia" class="form-control" disabled="disabled">
			<option value="0">Seleccionar Colonia</option>
		</select>


		<div class="row">
			<div class="col-4">
				<label>Ciudad</label>
				<input type="" name="" id="city" value="" class="form-control" disabled="">
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

		<input type="" name="" id="destinations" value="saltillo">
		<button type="submit" onclick="fnAbc();">ENMVIAR</button>
		<div class="card col-4" style="margin-left: auto;margin-right: auto;">
			<div class="card-body">
				<label>Distancia:</label>
				<input type="" name="" id="distance" disabled="" style="text-align: right;" class="form-control">
				<label>Tiempo:</label>
				<input type="" name="" id="duration" disabled="" style="text-align: right;" class="form-control">
			</div>
		</div>
	</div>
</body>
</html>


	<!--
	dicilio del ultimo cursor
	<input type="" name="dom_ultimo" value="https://maps.googleapis.com/maps/api/distancematrix/json?origins=405%20arcos%20historicos,arcos%20del%20sol,monterrey,%20mexico&destinations=Saltillo,%20mexico&mode=driving&language=es-419&key=AIzaSyAQ5IWFB4JUk2Z-VzBQS5N1GEOV__ZVm9A">
-->