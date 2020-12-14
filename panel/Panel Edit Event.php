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
    
    $Id_Events = $_POST['Id_Events'];
    $EventType = $_POST['EventType'];
    $Data = $_POST['Data'];
    $Time = $_POST['Time'];
    $Places = $_POST['Places'];
    $EventTypeName = $_POST['EventTypeName'];

    $Id_Events = htmlspecialchars($Id_Events);
    $EventType = htmlspecialchars($EventType);
    $Data = htmlspecialchars($Data);
    $Time = htmlspecialchars($Time);
    $Places = htmlspecialchars($Places);
    $EventTypeName = htmlspecialchars($EventTypeName);

    $Id_Events = urldecode($Id_Events);
    $EventType = urldecode($EventType);
    $Data = urldecode($Data);
    $Time = urldecode($Time);
    $Places = urldecode($Places);
    $EventTypeName = urldecode($EventTypeName);

    $Id_Events = trim($Id_Events);
    $EventType = trim($EventType);
    $Data = trim($Data);
    $Time = trim($Time);
    $Places = trim($Places);
    $EventTypeName = trim($EventTypeName);


    $result = $mysqli->query("SELECT ID, Type  FROM Type");


    while ($row = mysqli_fetch_array($result)) {
        $ID[] = $row['ID'];
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

        <title>События / Редактировать</title>
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
                            <h4>События / Редактировать</h4>
                        </a>
                    </div>
                </div>
                <div class="col-2 bg-light text-dark" style="min-height: 88vh;">
            <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active disabled" href="Panel.php">События</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Panel Type.php">Виды событий</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Panel Regular.php">Настроить расписание</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Report.php">Печать списков</a>
                        </li>
                    </ul>
            </div>
                <div class="col-10 mx-auto">
                    <div class="row" style="min-height: 50px;">
                        <div class="col-5">
                            Вид события
                        </div>
                        <div class="col-2">
                            Дата
                        </div>
                        <div class="col-2">
                            Время
                        </div>
                        <div class="col-3">
                            Кол-во мест
                        </div>
                    </div>

                   


                    <form action="UpdateEvent.php" method="post">
                        <div class="row" style="min-height: 50px;">
                            <div class="col-5">
                                <select name="EventType" required>

                                <option selected value="<?php echo $EventType; ?>"><?php echo $EventTypeName; ?></option>

                                <?php for($i=0;$i<count($ID);$i++){ ?>

                                    <option value="<?php echo $ID[$i]; ?>"><?php echo $Type[$i]; ?></option>

                                <?php } ?>

                            </select>
                            </div>
                            <div class="col-2">
                                <input name="Data" type="date" value="<?php echo $Data; ?>" required>
                            </div>
                            <div class="col-2">
                                <input name="Time" type="time" value="<?php echo $Time; ?>" required>
                            </div>
                            <div class="col-3">
                                <input name="Places" type="text" value="<?php echo $Places; ?>" required>
                            </div>
                        </div>



                     


<input style="display: none;" type="text" name="Id_Events" value="<?php echo $Id_Events; ?>">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>

    </html>