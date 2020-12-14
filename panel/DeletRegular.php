<?php

$Id_Reg = $_POST['Id_Reg'];


$Id_Reg = htmlspecialchars($Id_Reg);


$Id_Reg = urldecode($Id_Reg);


$Id_Reg = trim($Id_Reg);



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
    
    $result = $mysqli->query("DELETE FROM Regular_Events WHERE Id ='$Id_Reg' ");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel Regular.php");}
window.setTimeout("changeurl();",50);
</script>