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

$Id_Note_EVENTS = $_POST['Id_Note_EVENTS'];
$Id_Note_EVENTS = htmlspecialchars($Id_Note_EVENTS);
$Id_Note_EVENTS = urldecode($Id_Note_EVENTS);
$Id_Note_EVENTS = trim($Id_Note_EVENTS);

$client_id_FK = $_POST['client_id_FK'];
$client_id_FK = htmlspecialchars($client_id_FK);
$client_id_FK = urldecode($client_id_FK);
$client_id_FK = trim($client_id_FK);

$FName = $_POST['FName'];
$FName = htmlspecialchars($FName);
$FName = urldecode($FName);
$FName = trim($FName);

$LName = $_POST['LName'];
$LName = htmlspecialchars($LName);
$LName = urldecode($LName);
$LName = trim($LName);

$Who = $_POST['Who'];
$Who = htmlspecialchars($Who);
$Who = urldecode($Who);
$Who = trim($Who);

$WhoNUM = $_POST['WhoNUM'];
$WhoNUM = htmlspecialchars($WhoNUM);
$WhoNUM = urldecode($WhoNUM);
$WhoNUM = trim($WhoNUM);

$visitt = $_POST['visit'];
$visitt = htmlspecialchars($visitt);
$visitt = urldecode($visitt);
$visitt = trim($visitt);

$visitt_id = $_POST['visit_id'];
$visitt_id = htmlspecialchars($visitt_id);
$visitt_id = urldecode($visitt_id);
$visitt_id = trim($visitt_id);

$Comment = $_POST['Comment'];
$Comment = htmlspecialchars($Comment);
$Comment = urldecode($Comment);
$Comment = trim($Comment);

$result = $mysqli->query("SELECT Id, visit FROM visit");


while ($row = mysqli_fetch_array($result)) {
    $Id_visit[] = $row['Id'];
    $visit[] = $row['visit'];
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

    <title>Записи на события / Редактировать</title>
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
                        <h4>Записи на события / Редактировать</h4>
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
                    <div class="col-1">
                        ID Клиента
                    </div>
                    <div class="col-2">
                        Имя
                    </div>
                    <div class="col-2">
                        Фамилия
                    </div>
                    <div class="col-2">
                        Кто вписал
                    </div>
                    <div class="col-2">
                        Телефон вписавшего
                    </div>
                    <div class="col-1">
                        Статус
                    </div>
                    <div class="col-2">
                        Комментарий
                    </div>
                </div>




                <form action="UpdateNote.php" method="post">
                    <div class="row" style="min-height: 50px;">
                        <div class="col-1">
                            <input name="client_id_FK" type="text" value="<?php echo $client_id_FK; ?>">
                        </div>
                        <div class="col-2">
                            <input name="FName" type="text" value="<?php echo $FName; ?>">
                        </div>
                        <div class="col-2">
                            <input name="LName" type="text" value="<?php echo $LName; ?>">
                        </div>
                        <div class="col-2">
                            <input name="Who" type="text" value="<?php echo $Who; ?>">
                        </div>
                        <div class="col-2">
                            <input name="WhoNUM" type="text" value="<?php echo $WhoNUM; ?>">
                        </div>
                        <div class="col-1">
                            <select name="Status" required>

                            <option selected value="<?php echo $visitt_id; ?>"><?php echo $visitt; ?></option>

                                <?php for ($i = 0; $i < count($Id_visit); $i++) { ?>

                                    <option value="<?php echo $Id_visit[$i]; ?>"><?php echo $visit[$i]; ?></option>

                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-2">
                            <textarea name="Comment" type="text"><?php echo $Comment; ?></textarea>
                        </div>
                    </div>






                    <input style="display: none;" type="text" name="Id_Note_EVENTS" value="<?php echo $Id_Note_EVENTS; ?>">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>