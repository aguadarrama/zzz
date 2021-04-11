<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500&family=Miss+Fajardose&family=Signika:wght@300;400;500&family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title></title>
    <style type="text/css">
        html,body{
            background-color: #121212;
            color: gold;
        }
        *{
            font-family: "Quicksand",sans-serif;
            font-weight: 400;
        }
        label{
            font-size: 0.8rem;
            margin-bottom: 0px;
            position: relative;
            top: 5px;
            font-weight: 300;
        }
        input.form-control, input{
            margin: 0px;
            border:none;
            border-radius: 0px;
            border-bottom: solid 1px rgba(255, 255, 255,0.7);
            padding: 0px;
            font-weight: 500;
            height: 25px;
        }
        input.form-control:disabled, input:disabled{
            background-color: transparent;
            color: rgba(255, 255, 255,0.7);
            font-weight: 300;
        }
        h5{
            margin-bottom: 0px;
        }
        span{
            color: rgba(255, 255, 255,0.7);
        }
        .div-input{
            border-bottom: solid 1px rgba(255, 255, 255,0.7);
            color: rgba(255, 255, 255,0.7);
            font-weight: 300;
        }
    </style>
</head>
<body>
    <div style="background-color: gold; color: #121212; height: 40px; line-height: 40px; text-align: center; font-weight: 500; margin-bottom: 10px;">
        Licencia ABC
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="ANGR_perfil.jpeg" cxlass="col-8" style="margin-left: auto;margin-right: auto; height: 150px;">
            </div>
        </div>
        <h5>Datos Generales</h5>
        <label>Nombre Completo</label>
        <input id="name" value="Angel Narciso Guadarrama Romero" class="form-control" disabled="">
        <label>Dirección/Address</label>
        <input id="address" value="Arcos Historicos 405, Arcos del Sol, 64102" class="form-control" disabled="">
        <label>Municipio/City</label>
        <input id="city" class="form-control" value="Monterrey, Monterrey" disabled="">
        <label>Estado/State</label>
        <input id="state" value="Nuevo León" class="form-control" disabled="">
        <div class="row">
            <div class="col-6" style="background-color: red;">
                <label>Edad</label>
                <input id="old" value="54" class="form-control" disabled="">
            </div>
            <div class="col-6">
                <label>Tipo de Sangre</label>
                <input id="blood" value="AB+" class="form-control" disabled="">
            </div>
        </div>
        <br>

        <h5>Contacto de Emergencia</h5>
        <label>Nombre de Contacto/Contact Name</label>
        <input type="" name="" value="Clara Guadarrama Romero" class="form-control" disabled="">
        <label>Telefono/Phone</label>
        <input id="telefono" class="form-control" value="8111681052" disabled="">
        <a href="tel:8111681052">Llamar</a>

        <div class="row">
            <div class="col-6" style="">
                <label>Aseguradora Auto</label><br/>
                <span>Banorte Generalli</span> <a href="tel:8111681052">Llamar</a>
            </div>
            <div class="col-6">
                <label>Número de Poliza</label><br/>
                <div class="div-input">45985612</div>
            </div>
        </div>
        <br/>

        <h5>Perfil Clinico</h5>
        <label>Morbilidades</label>
        <input id="telefono" class="form-control" value="Hipertensión" disabled="">
        <label>Alergias</label>
        <input id="telefono" class="form-control" value="Ninguna" disabled="">
        <label>Medicamentos Cronicos</label>
        <input id="telefono" class="form-control" value="Enalapril, Rivotril" disabled="">
    </div>
<!--
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>
