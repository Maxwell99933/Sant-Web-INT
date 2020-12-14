<?php

$Type = $_POST['EventType'];
$Day = $_POST['Day'];
$Quantity_For_events = $_POST['Quantity_For_events'];
$Time = $_POST['Time'];



$Type = htmlspecialchars($Type);
$Day = htmlspecialchars($Day);
$Quantity_For_events = htmlspecialchars($Quantity_For_events);
$Time = htmlspecialchars($Time);



$Type = urldecode($Type);
$Day = urldecode($Day);
$Quantity_For_events = urldecode($Quantity_For_events);
$Time = urldecode($Time);



$Type = trim($Type);
$Day = trim($Day);
$Quantity_For_events = trim($Quantity_For_events);
$Time = trim($Time);




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
    
    $result = $mysqli->query("INSERT INTO Regular_Events ( type_id, Quantity_For_events, Time, Id_Day) VALUES ('$Type','$Quantity_For_events','$Time','$Day')");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel Regular.php");}
window.setTimeout("changeurl();",50);
</script>