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
$grupoid = $r[0];
$query2 = "SELECT  * FROM notif_codesAC WHERE group_id='".$grupoid ."'";

$result2 = mysql_query($query2) or die(mysql_error());
$row2 = mysql_fetch_array($result2); 
//organizer_code access_code

            echo '<input type="radio" data-org="' . $row2['organizer_code'] . '" data-part="' . $row2['access_code'] . '" value="' . $r[0] . '" id="grupo" name="grupo" class="grupo" required> ' . $r[1] . '<br>';
        }

        ?>

        <input type="submit" class="submit">

    </form>
<input name="organizador" id="organizador" type="text">
<input name="participante" id="participante" type="text">
</div>

<div id="carga"></div>
<script>
$('input:radio').change(function (e) {
    e.preventDefault();
 //   var value = $(this).data('value');
    //$('.button').data('value', value);
    console.log('ORGANIZADOR: '+$(this).data('org'));
	$('#organizador').val($(this).data('org'));
    console.log('PARTICIPANTE: '+$(this).data('part'));
		$('#participante').val($(this).data('part'));

});</script>
</body>
</html>