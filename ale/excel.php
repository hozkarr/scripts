<html>
<head>
    <?php

    include 'php/con.php';

    if (!isset($_POST['troncal'])) {
        echo "
			<SCRIPT LANGUAGE='javascript'>
			location.href = 'index.php';
			alert('Ingreso exitoso, ahora sera dirigido a la pagina principal.');
			</SCRIPT>";

        header("Location: index.php");

    }

    if (strlen($_POST['fecha'] > 1)) {

        $fecha = $_POST['fecha'];

        $sql = mysql_query("SELECT  `cdr`.`called_number` AS Troncal,  `cdr`.`start_time` AS Inicio,
                            `cli`.`company` AS Cliente , `cdr`.`conference_id` AS Conferencia,
                            CEIL( TIME_TO_SEC(`cdr`.`connect_time` ) /60 ) AS Minutos
                            FROM  `cdr_logbook` cdr , Clients cli
                            WHERE (`called_number` IN (" . implode(",", $_POST['troncal']) . "))
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
    <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="resources/demo.css">

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="resources/demo.js"></script>
    <script type="text/javascript" language="javascript" class="init">

        $(document).ready(function () {
            $('#example').dataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "pagingType": "full_numbers"
            });
        });

    </script>

    <script src="js/script.js"></script>


    <script>
        $(function () {
            $("#includedContent").load("index.php");
        });
    </script>
</head>
<body>

<div id="includedContent"></div>

<input type="button" id="btnExport" value=" Export Table data into Excel "/>
<br> <br>

<div id="dvData">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th></th>
            <th>Troncal</th>
            <th>Inicio</th>
            <th>Cliente</th>
            <th>Conferencia</th>
            <th>Minutos</th>
        </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>
</div>

</body>
</html>

