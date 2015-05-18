<html>
<head>
    <?php

    include '../php/con.php';

    $grupos = mysql_query("SELECT * FROM notif_groups ORDER BY  `notif_groups`.`group_id` ASC ");


    ?>
    <script type="text/javascript" language="javascript" src="jquery-1.6.4.min.js"></script>
    <script type="text/javascript" language="javascript" src="script.js"></script>

</head>

<body>

<div id="thispage">

    <form>
        <?php
        while ($r = mysql_fetch_array($grupos)) {

            echo '<input type="radio" value="' . $r[0] . '" id="grupo" name="grupo" class="grupo" required> ' . $r[1] . '<br>';
        }

        ?>

        <input type="submit" class="submit">

    </form>

</div>

<div id="carga"></div>
</body>
</html>