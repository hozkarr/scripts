<html>
<head>

    <link rel="stylesheet" type="text/css" href="../css/mystyle.css">

</head>

<body>

<div id="formulario">
    <form action="b.php" method="post">
        <?php

        for ($a = 4600; $a <= 4649; $a++) {
            echo '<input type="checkbox" class="form" value="' . $a . '" name="troncal[]" />' . $a;
        }

        for ($a = 2100; $a <= 2149; $a++) {
            echo '<input type="checkbox" class="form" value="' . $a . '" name="troncal[]" />' . $a;
        }


        ?>
        <div id="fecha-form">
            <label for="fecha">Seleccione una fecha</label>
            <input type="date" name="fecha" id="fecha" class="fecha"/>

            <label for="rango">o selecciona un rango</label>
            <input type="date" name="from" id="rango" class="from"/>
            <input type="date" name="to" id="rango" class="to"/>
        </div>
        <br>

        <input type="submit" class="enviar">
    </form>
</div>

</body>
</html>