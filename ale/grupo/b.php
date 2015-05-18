<html>
<head>
    <?php

    include '../php/con.php';

    if (strlen($_POST['fecha'] > 1)) {

        $fecha = $_POST['fecha'];

        $sql = mysql_query("SELECT  `called_number` AS Troncal,  `start_time` AS Inicio,  `si_name` AS Cliente,
                          `conference_id` AS Conferencia, CEIL( TIME_TO_SEC(  `connect_time` ) /60 ) AS Minutos
                            FROM  `cdr_logbook` cdr WHERE (`called_number` IN (" . implode(",", $_POST['troncal']) . "))
                          AND (`date` = '$fecha')
                         ORDER BY  `cdr`.`called_number` ASC ");

    } else {

        $to = $_POST['to'];
        $from = $_POST['from'];

        $sql = mysql_query("SELECT  `called_number` AS Troncal,  `start_time` AS Inicio,  `si_name` AS Cliente,
                          `conference_id` AS Conferencia, CEIL( TIME_TO_SEC(  `connect_time` ) /60 ) AS Minutos
                            FROM  `cdr_logbook` cdr WHERE (`called_number` IN (" . implode(",", $_POST['troncal']) . "))
                          AND (`date` BETWEEN  '$from' AND  '$to')
                         ORDER BY  `cdr`.`called_number` ASC ");


    }

    if (!$sql) {
        die('Invalid query: ' . mysql_error());
    }

    ?>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="../js/script.js"></script>

    <script>
        $(function () {
            $("#includedContent").load("test.php");
        });
    </script>
</head>
<body>

<div id="includedContent"></div>
<br><br>
<input type="button" id="btnExport" value=" Export Table data into Excel "/>
<br> <br>

<div id="dvData">
    <table style="margin: 0px auto;">
        <tr>
            <th></th>
            <th>Troncal</th>
            <th>Inicio</th>
            <th>Cliente</th>
            <th>Conferencia</th>
            <th>Minutos</th>
        </tr>
        <?php

        $i = 1;
        while ($r = mysql_fetch_array($sql)) {
            if ($r['Cliente'] == "") {
                continue;
            }
            echo "<tr>
                    <td>" . $i . "</td>
                    <td>" . $r['Troncal'] . "</td>
                    <td>" . $r['Inicio'] . "</td>
                    <td>" . $r['Cliente'] . "</td>
                    <td>" . $r['Conferencia'] . "</td>
                    <td>" . $r['Minutos'] . "</td>
                </tr>";
            $i++;
        }
        ?>
    </table>
</div>

</body>
</html>

