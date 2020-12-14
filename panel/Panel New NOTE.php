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
$Id_Events = htmlspecialchars($Id_Events);
$Id_Events = urldecode($Id_Events);
$Id_Events = trim($Id_Events);

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

    <title>Записи на события / Добавить</title>
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
                        <h4>Записи на события / Добавить</h4>
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




                <form action="newNote.php" method="post">
                    <div class="row" style="min-height: 50px;">
                        <div class="col-1">
                            <input name="client_id_FK" type="text">
                        </div>
                        <div class="col-2">
                            <input name="FName" type="text">
                        </div>
                        <div class="col-2">
                            <input name="LName" type="text">
                        </div>
                        <div class="col-2">
                            <input name="Who" type="text">
                        </div>
                        <div class="col-2">
                            <input name="WhoNUM" type="text">
                        </div>
                        <div class="col-1">
                            <select name="Status" required>

                                <?php for ($i = 0; $i < count($Id_visit); $i++) { ?>

                                    <option value="<?php echo $Id_visit[$i]; ?>"><?php echo $visit[$i]; ?></option>

                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-2">
                            <input name="Comment" type="text">
                        </div>
                    </div>






                    <input style="display: none;" type="text" name="Id_Events" value="<?php echo $Id_Events; ?>">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>