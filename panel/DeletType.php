<?php

$type_id = $_POST['type_id'];


$type_id = htmlspecialchars($type_id);


$type_id = urldecode($type_id);


$type_id = trim($type_id);

ECHO $type_id;


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
    
    $result = $mysqli->query("DELETE FROM Type WHERE id ='$type_id' ");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel Type.php");}
window.setTimeout("changeurl();",50);
</script>