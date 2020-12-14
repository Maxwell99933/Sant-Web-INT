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
    
    $result = $mysqli->query("SELECT Regular_Events.Id, Regular_Events.Quantity_For_events, Regular_Events.Time, Regular_Events.Id_Day, WEEKDAYS.Day, Regular_Events.type_id, Type.Type FROM Regular_Events INNER JOIN Type ON Type.id = Regular_Events.type_id INNER JOIN WEEKDAYS ON WEEKDAYS.id = Regular_Events.Id_Day");


    while ($row = mysqli_fetch_array($result)) {
        $Id[] = $row['Id'];
        $Quantity_For_events[] = $row['Quantity_For_events'];
        $Day[] = $row['Day'];
        $Time[] = $row['Time'];
        $Id_Day[] = $row['Id_Day'];
        $type_id[] = $row['type_id'];
        $Type[] = $row['Type'];
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

    <title>Настроить расписание</title>
    <style>
        .active{
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-light text-dark">
                <img class="mx-auto p-2 m-2" src="Logo.svg" style="height: 100px; display: block;">
                <div class="row">
                    <a class="mx-auto text-dark">
                        <h4>Настроить расписание</h4>
                    </a>
                </div>
            </div>
            <div class="col-2 bg-light text-dark" style="min-height: 88vh;">
            <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="Panel.php">События</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Panel Type.php">Виды событий</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active disabled" href="Panel Regular.php">Настроить расписание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Report.php">Печать списков</a>
                        </li>
                    </ul>
            </div>
            <div class="col-10 mx-auto">
                <div class="row" style="min-height: 50px;">
                    <div class="col-1">
                        ID
                    </div>
                    <div class="col-2">
                        Вид события
                    </div>
                    <div class="col-2">
                        День
                    </div>
                    <div class="col-2">
                        Время
                    </div>
                    <div class="col-1">
                        Кол-во мест
                    </div>
                    <div class="col-4">
                    </div>
                </div>

                <?php for($i=0;$i<count($Id);$i++){ ?>
                                
                                
                             <form method="post">  
                <div class="row" style="min-height: 50px;">
                    <div class="col-1">
                        <p><?php echo $Id[$i]; ?> <input style="display: none;" type="text" name="Id_Reg" value="<?php echo $Id[$i]; ?>"></p> 
                    </div>
                    <div class="col-2">
                        <p><?php echo $Type[$i]; ?> <input style="display: none;" type="text" name="EventType" value="<?php echo $type_id[$i]; ?>">
                        <input style="display: none;" type="text" name="EventTypeName" value="<?php echo $Type[$i]; ?>">
                        </p>
                    </div>
                    <div class="col-2">
                        <p><?php echo $Day[$i]; ?><input style="display: none;" type="text" name="Day" value="<?php echo $Day[$i]; ?>">
                        <input style="display: none;" type="text" name="Id_Day" value="<?php echo $Id_Day[$i]; ?>">
                    </p>
                    </div>
                    <div class="col-2">
                        <p><?php echo $Time[$i]; ?><input style="display: none;" type="text" name="Time" value="<?php echo $Time[$i]; ?>"></p>
                    </div>
                    <div class="col-1">
                        <p><?php echo $Quantity_For_events[$i]; ?><input style="display: none;" type="text" name="Places" value="<?php echo $Quantity_For_events[$i]; ?>"></p>
                    </div>
                    <div class="col-4">
                        <button formaction="Panel Edit Regular.php" type="submit" class="btn btn-info">Редактировать</button>
                        <button formaction="DeletRegular.php" type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
                </form> 


                            <?php } ?>

                
            
                <a href="Panel New Regular.php" type="button" class="btn btn-primary">Добавить</a>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>