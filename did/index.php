<html>
<head>

    <link rel="stylesheet" href="build/base.css">
    <link rel="stylesheet" href="build/grids.css">
    <link rel="stylesheet" href="build/grids-responsive.css">
    <link rel="stylesheet" href="build/buttons.css">
    <link rel="stylesheet" href="build/forms.css">

    <?php
    include 'php/con.php';


    $clientes = mysql_query("SELECT  `sp_name` , `sp_number` FROM  `service_prvd` ORDER BY  `sp_number` ASC  ");

    ?>
</head>
<body>
<div id="combo" style="text-align: center">
    <form action="troncatable.php" method="post" class="pure-form">
        <fieldset>
            <label for="cliente">Seleccione un provider</label>
            <select id="cliente" name="cliente">
                <?php

                while ($r = mysql_fetch_array($clientes)) {

                    echo '<option value="' . $r[1] . '" >' . ucwords($r[0]) . '</option>';

                }
                ?>
            </select>
            <input type="submit" class="pure-button pure-button-primary">

            <input type=button onClick="parent.location='troncales.php'" value='Alta de numeros' class="pure-button pure-button-primary">
        </fieldset>
    </form>
</div>
<div id="carga"></div>


</body>
</html>