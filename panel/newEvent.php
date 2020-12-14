<?php

$EventType = $_POST['EventType'];
$Data = $_POST['Data'];
$Time = $_POST['Time'];
$Places = $_POST['Places'];


$EventType = htmlspecialchars($EventType);
$Data = htmlspecialchars($Data);
$Time = htmlspecialchars($Time);
$Places = htmlspecialchars($Places);


$EventType = urldecode($EventType);
$Data = urldecode($Data);
$Time = urldecode($Time);
$Places = urldecode($Places);


$EventType = trim($EventType);
$Data = trim($Data);
$Time = trim($Time);
$Places = trim($Places);



$db_host = "172.17.0.1";
    $db_user = "homeless";
    $db_password = "12345ghJkbn";
    $db_base = "homeless";
    $db_port = "39410";

    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base,$db_port);

	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

mysqli_set_charset($mysqli, "utf8");
    
    $result = $mysqli->query("INSERT INTO Events ( type_id, Quantity_For_events, Date_EV, Time_EV, id_status) VALUES ('$EventType','$Places','$Data','$Time', 2)");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel.php");}
window.setTimeout("changeurl();",5);
</script>