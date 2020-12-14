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

$EventType = $_POST['EventType'];
$EventType = htmlspecialchars($EventType);
$EventType = urldecode($EventType);
$EventType = trim($EventType);

$Data = $_POST['Data'];
$Data = htmlspecialchars($Data);
$Data = urldecode($Data);
$Data = trim($Data);

$DataTwo = $_POST['DataTwo'];
$DataTwo = htmlspecialchars($DataTwo);
$DataTwo = urldecode($DataTwo);
$DataTwo = trim($DataTwo);

If ($DataTwo == ''){
    If ($EventType == '123999'){
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE Date_EV = '$Data' ");
    }else{
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE type_id = '$EventType' AND Date_EV = '$Data' ");
    } 
} else{
    If ($EventType == '123999'){
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE Date_EV >= '$Data' AND Date_EV <= '$DataTwo' ");
    }else{
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE type_id = '$EventType' AND Date_EV >= '$Data' AND Date_EV <= '$DataTwo' ");
    }
}




while ($row = mysqli_fetch_array($result)) {
    $Id_Note_EVENTS[] = $row['Id_Note_EVENTS'];
    $Id_Events_FK[] = $row['Id_Events_FK'];
    $client_id_FK[] = $row['client_id_FK'];
    $FName[] = $row['FName'];
    $LName[] = $row['LName'];
    $Who[] = $row['Who'];
    $WhoNUM[] = $row['WhoNUM'];
    $Comment[] = $row['Comment'];
    $visit[] = $row['visit'];
    $visit_id[] = $row['visit_id'];
    $Type[] = $row['Type'];
    $Date_EV[] = $row['Date_EV'];
    $Time_EV[] = $row['Time_EV'];
}

?>

<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Список</title>
    <style>
        .active {
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row border" style="min-height: 50px;">
            <div class="col-1 border">
                Дата
            </div>
            <div class="col-1 border">
                Время
            </div>
            <div class="col-2 border">
                Фамилия
            </div>
            <div class="col-1 border">
                Имя
            </div>
            <div class="col-2 border">
                Событие
            </div>
            <div class="col-2 border">
                Комментарий
            </div>
            <div class="col-1 border">
                Кто записал
            </div>
            <div class="col-1 border">
                Телеф.записавшего
            </div>
            <div class="col-1 border">
                Статус
            </div>
        </div>

        <?php for ($i = 0; $i < count($Id_Note_EVENTS); $i++) { ?>


            <div class="row border" style="min-height: 50px;">
                <div class="col-1 border">
                    <?php echo $Date_EV[$i]; ?>
                </div>
                <div class="col-1 border">
                <?php echo $Time_EV[$i]; ?>
                </div>
                <div class="col-2 border">
                    <?php echo $LName[$i]; ?>
                </div>
                <div class="col-1 border">
                    <?php echo $FName[$i]; ?>
                </div>
                <div class="col-2 border">
                <?php echo $Type[$i]; ?>
                </div>
                <div class="col-2 border">
                <?php echo $Comment[$i]; ?>
                </div>
                <div class="col-1 border">
                    <?php echo $Who[$i]; ?>
                </div>
                <div class="col-1 border">
                <?php echo $WhoNUM[$i]; ?>
                </div>
                <div class="col-1 border">
                <?php echo $visit[$i]; ?>
                </div>
            </div>




        <?php } ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>