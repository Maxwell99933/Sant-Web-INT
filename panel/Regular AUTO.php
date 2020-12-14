<?php 

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

$result = $mysqli->query("SELECT type_id, Quantity_For_events, id_Day, Time  FROM Regular_Events");


while ($row = mysqli_fetch_array($result)) {
    $type_id[] = $row['type_id'];
    $Quantity_For_events[] = $row['Quantity_For_events'];
    $id_Day[] = $row['id_Day'];
    $Time[] = $row['Time'];
}

$ToDayData = date("d.m.Y");

$ToDayWeek = date("w") + 1;

$days = array( 1 => "Monday" , "Tuesday" , "Wednesday" , "Thursday" , "Friday" , "Saturday" , "Sunday" );





for($i=0;$i<count($type_id);$i++){   

    $date =  strtotime("next " . $days[$id_Day[$i]] ." ");

    $date = date("Y-m-d", $date);

    echo $date;

    //echo "Цикл пошел";

    $result = $mysqli->query("SELECT COUNT(type_id) as total FROM Events WHERE type_id = '$type_id[$i]' AND Date_EV = '$date' AND Time_EV = '$Time[$i]' ");

    while ($row = mysqli_fetch_array($result)) {
        $total = $row['total'];
    }

    echo "Total =";
    echo $total;
  //  echo "PPP";

    if ($total != 0){

    } else{

        $result = $mysqli->query("INSERT INTO Events (type_id, Quantity_For_events, Date_EV, Time_EV, id_status ) VALUES ('$type_id[$i]','$Quantity_For_events[$i]', '$date', '$Time[$i]', 2)");
    
        if ($mysqli->query($result) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $result . "<br>" . $mysqli->error;
        }
        
    }

    





}


?>