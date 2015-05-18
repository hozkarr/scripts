<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

</head>

<body>

<div id="formulario">
    <form action="excel.php" method="post">
        <div id="fecha-form">
            <div class="alpie" style="position: relative;padding-top: 15px;">
                <label for="fecha">Seleccione una fecha</label>
                <input type="date" name="fecha" id="fecha" class="fecha"/>

                <label for="rango">o selecciona un rango</label>
                <input type="date" name="from" id="rango" class="from"/>
                <input type="date" name="to" id="rango" class="to"/>

                <label for="publico"></label>
                <input type="checkbox" id="publico">
            </div>
        </div>
        <?php

        echo '<div class="left"><table style="border-spacing: 0px; font-size: 15px;" cellpadding="5">
            <colgroup>';
        for ($c = 1; $c <= 5; $c++) {
            echo ' <col style = "background-color:#B9D7D9" >
                    <col style = "background-color:#F4EBC3" >';
        }
        echo '  </colgroup>';

        $i = 0;

        for ($a = 4600; $a <= 4649; $a++) {
            if ($i == 0 || $i == 10 || $i == 20 || $i == 30 || $i == 40) {
                echo '<tr>';
            }

            echo '<td><input type="checkbox" class="form" value="' . $a . '" name="troncal[]" />' . $a . "</td>";

            if ($i == 9 || $i == 19 || $i == 29 || $i == 39 || $i == 49) {
                echo '</tr>';
            }
            $i++;
        }

        echo '</table></div>';

        echo '<div class="right"><table style="margin: 0px auto; border-spacing: 0px;" cellpadding="5">
            <colgroup>';
        for ($c = 1; $c <= 5; $c++) {
            echo ' <col style = "background-color:#B9D7D9" >
                    <col style = "background-color:#F4EBC3" >';
        }
        echo '  </colgroup>';

        $i = 0;

        for ($a = 2100; $a <= 2149; $a++) {
            if ($i == 0 || $i == 10 || $i == 20 || $i == 30 || $i == 40) {
                echo '<tr>';
            }

            echo '<td><input type="checkbox" class="form" value="' . $a . '" name="troncal[]" />' . $a . "</td>";

            if ($i == 9 || $i == 19 || $i == 29 || $i == 39 || $i == 49) {
                echo '</tr>';
            }
            $i++;
        }

        echo '</table></div>';

        ?>

        <br>

        <div class="boton">
            <input type="submit" class="enviar">
        </div>
    </form>
</div>

</body>
</html>