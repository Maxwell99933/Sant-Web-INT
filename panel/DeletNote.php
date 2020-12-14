<?php

$Id_Note_EVENTS = $_POST['Id_Note_EVENTS'];


$Id_Note_EVENTS = htmlspecialchars($Id_Note_EVENTS);


$Id_Note_EVENTS = urldecode($Id_Note_EVENTS);


$Id_Note_EVENTS = trim($Id_Note_EVENTS);



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

    $result = $mysqli->query("SELECT Id_Events_FK FROM NOTE_FOR_Events WHERE Id_Note_EVENTS = '$Id_Note_EVENTS' ");

    while ($row = mysqli_fetch_array($result)) {
        $Id_Events_FK = $row['Id_Events_FK'];
    }
    
    $result = $mysqli->query("DELETE FROM NOTE_FOR_Events WHERE Id_Note_EVENTS = '$Id_Note_EVENTS' ");
    $result = $mysqli->query("UPDATE Events SET Quantity_For_events = Quantity_For_events + 1 WHERE Id_Events = '$Id_Events_FK' ");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel.php");}
window.setTimeout("changeurl();",50);
</script>