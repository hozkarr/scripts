<html>
<head>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Forms Tests</title>

    <link rel="stylesheet" href="build/base.css">
    <link rel="stylesheet" href="build/grids.css">
    <link rel="stylesheet" href="build/grids-responsive.css">
    <link rel="stylesheet" href="build/buttons.css">
    <link rel="stylesheet" href="build/forms.css">

    <link rel="stylesheet" href="build/base.css">
    <link rel="stylesheet" href="build/tables.css">
    <?php

    include 'php/con.php';

    $clientes = mysql_query("SELECT  `sp_name` , `sp_number` FROM  `service_prvd` ORDER BY  `sp_number` ASC  ");

    ?>
</head>
<body>
<div id="formulario" style="margin: auto; width: 90%">
    <form class="pure-form pure-form-stacked" action="php/data.php" method="post">
        <fieldset>
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="cliente">Seleccione un provider</label>
                    <select id="cliente" name="cliente" class="pure-input-1-2">
                        <?php

                        while ($r = mysql_fetch_array($clientes)) {

                            echo '<option value="' . $r[1] . '" >' . ucwords($r[0]) . '</option>';

                        }
                        ?>
                    </select>
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" class="pure-u-23-24" name="nombre" type="text">
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="numero">Numero</label>
                    <input id="numero" class="pure-u-23-24" name="numero" type="text">
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="servicio">Servicio</label>
                    <input id="servicio" class="pure-u-23-24" name="servicio" type="text">
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="descripcion">Descripcion</label>
                    <input id="descripcion" class="pure-u-23-24" name="descripcion" type="text">
                </div>
            </div>

            <button type="submit" name="envio" class="pure-button pure-button-primary">Enviar</button>

        </fieldset>
    </form>
</div>


</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 02/03/15
 * Time: 14:45
 */ 