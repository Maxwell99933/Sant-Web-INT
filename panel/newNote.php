<?php

$Id_Events = $_POST['Id_Events'];
$client_id_FK = $_POST['client_id_FK'];
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Who = $_POST['Who'];
$WhoNUM = $_POST['WhoNUM'];
$Comment = $_POST['Comment'];
$Status = $_POST['Status'];


$Id_Events = htmlspecialchars($Id_Events);
$client_id_FK = htmlspecialchars($client_id_FK);
$FName = htmlspecialchars($FName);
$LName = htmlspecialchars($LName);
$Who = htmlspecialchars($Who);
$WhoNUM = htmlspecialchars($WhoNUM);
$Comment = htmlspecialchars($Comment);
$Status = htmlspecialchars($Status);


$Id_Events = urldecode($Id_Events);
$client_id_FK = urldecode($client_id_FK);
$FName = urldecode($FName);
$LName = urldecode($LName);
$Who = urldecode($Who);
$WhoNUM = urldecode($WhoNUM);
$Comment = urldecode($Comment);
$Status = urldecode($Status);


$Id_Events = trim($Id_Events);
$client_id_FK = trim($client_id_FK);
$FName = trim($FName);
$LName = trim($LName);
$Who = trim($Who);
$WhoNUM = trim($WhoNUM);
$Comment = trim($Comment);
$Status = trim($Status);

if ($client_id_FK == ""){
    $client_id_FK = 'NULL';
}

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
    
    $Id_Events_FK = (int)$Id_Events_FK;
    //$client_id_FK = (int)$client_id_FK;
    
    $result = $mysqli->query("INSERT INTO NOTE_FOR_Events (Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment, visit_id) VALUES ('$Id_Events',{$client_id_FK},'$FName','$LName','$Who','$WhoNUM', '$Comment','$Status')");
    //$result = $mysqli->query("Insert into NOTE_FOR_Events (Id_Events_FK, client_id_FK, Name, phone, EMail, Comment) Values (6, 15, 'Иван15', '88008008015', 'Example15@mail.ru', 'Коммент15' )");
    //$result = $mysqli->query("INSERT INTO NOTE_FOR_Events (Name, Id_Events_FK, phone, EMail, Comment) VALUES ('$Name', 109,'$phone','$EMail','$Comment')");
    
    

if ($mysqli->query($result) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $result . "<br>" . $mysqli->error;
}


?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel.php");}
window.setTimeout("changeurl();",50);
</script>