<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php

    include 'php/con.php';

    $cliente = $_POST['cliente'];


    $did = mysql_query("SELECT `sip_name` as name, `sip_description` AS description , `sip_did` as sipid
                        FROM  `sip_prvd`WHERE  `sip_sp_id` = $cliente");

    $sip = mysql_query("SELECT `sip_name` as name, `sip_description` AS description , `sip_did` as sipid
                        FROM   `Proveedores_sip` WHERE  `sip_sp_id` = $cliente");

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
            $('table.display').dataTable({
                "scrollY": "300px",
                "scrollCollapse": true,
                "pagingType": "full_numbers"
            });
        });

    </script>
    <script>
        $(function () {
            $("#includedContent").load("index.php");
        });
    </script>

</head>
<body>


<div id="includedContent"></div>

<div id="tabla" style="width: 80%; margin: auto">
    <form class="pure-form">
        <fieldset>
            <legend>Tabla de DID</legend>
            <table id="" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Troncal</th>
                    <th>Numero</th>
                    <th>Region</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while ($r = mysql_fetch_array($did)) {
                    echo "<tr>
                    <td>" . $r['name'] . "</td>
                    <td>" . $r['sipid'] . "</td>
                    <td>" . $r['description'] . "</td>
                </tr>";
                }
                ?>
                </tbody>
            </table>
             <br>
            <legend>Tabla de SIP</legend>

            <table id="" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Troncal</th>
                    <th>Numero</th>
                    <th>Region</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while ($r = mysql_fetch_array($sip)) {
                    echo "<tr>
                    <td>" . $r['name'] . "</td>
                    <td>" . $r['sipid'] . "</td>
                    <td>" . $r['description'] . "</td>
                </tr>";
                }
                ?>
                </tbody>
            </table>
        </fieldset>
    </form>
</div>
</body>
</html>

