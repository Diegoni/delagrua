<?php require_once('Connections/config.php'); ?>
<?php require_once('session.php'); ?>
<?php require_once('funciones.php'); ?>
<?php

$taller = $_GET['taller'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formatted_address']) {

        $updateSQL = sprintf("UPDATE `dlg_taller` SET
        direction=%s,
        point_of_interest=%s,
        lat=%s,
        lng=%s,
        location=%s,
        location_type=%s,
        formatted_address=%s,
        bounds=%s,
        viewport=%s,
        route=%s,
        street_number=%s,
        postal_code=%s,
        locality=%s,
        sublocality=%s,
        country=%s,
        country_short=%s,
        administrative_area_level_1=%s,
        place_id=%s,
        reference=%s,
        url=%s,
        website=%s
        WHERE idtaller=%s
        ",
            GetSQLValueString($_POST['name'], "text"),
            GetSQLValueString($_POST['point_of_interest'], "text"),
            GetSQLValueString($_POST['lat'], "text"),
            GetSQLValueString($_POST['lng'], "text"),
            GetSQLValueString($_POST['location'], "text"),
            GetSQLValueString($_POST['location_type'], "text"),
            GetSQLValueString($_POST['formatted_address'], "text"),
            GetSQLValueString($_POST['bounds'], "text"),
            GetSQLValueString($_POST['viewport'], "text"),
            GetSQLValueString($_POST['route'], "text"),
            GetSQLValueString($_POST['street_number'], "text"),
            GetSQLValueString($_POST['postal_code'], "text"),
            GetSQLValueString($_POST['locality'], "text"),
            GetSQLValueString($_POST['sublocality'], "text"),
            GetSQLValueString($_POST['country'], "text"),
            GetSQLValueString($_POST['country_short'], "text"),
            GetSQLValueString($_POST['administrative_area_level_1'], "text"),
            GetSQLValueString($_POST['place_id'], "text"),
            GetSQLValueString($_POST['reference'], "text"),
            GetSQLValueString($_POST['url'], "text"),
            GetSQLValueString($_POST['website'], "text"),
            GetSQLValueString($taller, "int")
            );

mysql_select_db($database_config, $config);
$Result1 = mysql_query($updateSQL, $config) or die(mysql_error());

$redirect = "taller_editar.php?idtaller=" . $taller;
header(sprintf("Location: %s", $redirect));

}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Agregar sucursal</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="<?php echo $url_relativa;?>css/normalize.min.css">
    <link rel="stylesheet" href="<?php echo $url_relativa;?>css/main.css">
    <link href="<?php echo $url_relativa;?>css/grua.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_relativa;?>fonts/fuentes.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url_relativa;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCud2oOF9lON1Nk5FurTzoQIlbghOH8eOA"></script>
    <script src="<?php echo $url_relativa;?>js/vendor/jquery.geocomplete.min.js"></script>


    <style type="text/css" media="screen">
        .map_canvas {
            float: left;
            width: 80%;
            height: 400px;
        }

        form {
            width: 20%;
            float: left;
        }

        fieldset {
            width: 320px;
            margin-top: 20px
        }

        label {
            display: block;
            margin: 0.5em 0 0em;
        }

        input {
            width: 95%;
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="cont960">
        <h1>Agregar sucursal</h1>

        <form action="" method="post">
            <input id="geocomplete" type="text" placeholder="Dirección" value="" />
            <input id="find" type="button" value="Buscar" />


            <input placeholder="taller" name="idtaller" type="hidden" value="<?php echo $_GET['taller'] ?>">

            <input placeholder="Name" name="name" type="hidden" value="">

            <input placeholder="POI Name" name="point_of_interest" type="hidden" value="">

            <input placeholder="Latitude" name="lat" type="hidden" value="">

            <input placeholder="Longitude" name="lng" type="hidden" value="">

            <input placeholder="Location" name="location" type="hidden" value="">

            <input placeholder="Location Type" name="location_type" type="hidden" value="">

            <input placeholder="Formatted Address" name="formatted_address" type="hidden" value="">

            <input placeholder="Bounds" name="bounds" type="hidden" value="">

            <input placeholder="Viewport" name="viewport" type="hidden" value="">

            <input placeholder="Route" name="route" type="hidden" value="">

            <input placeholder="Street Number" name="street_number" type="hidden" value="">

            <input placeholder="Postal Code" name="postal_code" type="hidden" value="">

            <input placeholder="Localidad" name="locality" type="text" value="">

            <input placeholder="Sub Locality" name="sublocality" type="hidden" value="">

            <input placeholder="Country" name="country" type="hidden" value="">

            <input placeholder="Country Code" name="country_short" type="hidden" value="">

            <input placeholder="Provincia" name="administrative_area_level_1" type="text" value="">

            <input placeholder="Place ID" name="place_id" type="hidden" value="">

            <input placeholder="Reference" name="reference" type="hidden" value="">

            <input placeholder="URL" name="url" type="hidden" value="">

            <input placeholder="Website" name="website" type="hidden" value="">

            <button class="button">Guardar</button>
        </form>
        <div class="map_canvas"></div>

    </div>
    <script>
        $(function() {
            $("#geocomplete").geocomplete({
                map: ".map_canvas",
                details: "form",
                // types: ["geocode", "establishment"],
                country: 'ar',
                markerOptions: {
                    draggable: true
                }
            });

            $("#find").click(function() {
                $("#geocomplete").trigger("geocode");
            });

            $("#geocomplete").bind("geocode:dragged", function(event, latLng){
          // $("input[name=lat]").val(latLng.lat());
          // $("input[name=lng]").val(latLng.lng());
          $("#geocomplete").geocomplete("find", latLng.toString());
      });
        });
    </script>

</body>

</html>