<?php

$Id_Events = $_POST['Id_Events'];


$Id_Events = htmlspecialchars($Id_Events);


$Id_Events = urldecode($Id_Events);


$Id_Events = trim($Id_Events);

ECHO $Id_Events;


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
    
    $result = $mysqli->query("DELETE FROM Events WHERE Id_Events ='$Id_Events' ");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel.php");}
window.setTimeout("changeurl();",50);
</script>