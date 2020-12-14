<?php

$type_id = $_POST['type_id'];
$type_id = htmlspecialchars($type_id);
$type_id = urldecode($type_id);
$type_id = trim($type_id);

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

$result = $mysqli->query("SELECT Type, Description FROM Type WHERE id='$type_id' ");


while ($row = mysqli_fetch_array($result)) {
    $Description = $row['Description'];
    $Type = $row['Type'];
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

        <title>Вид События / Добавить</title>
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
                            <h4>Вид События / Добавить</h4>
                        </a>
                    </div>
                </div>
                <div class="col-2 bg-light text-dark" style="min-height: 88vh;">
            <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="Panel.php">События</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active disabled" href="Panel Type.php">Виды событий</a>
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
                        <div class="col-3">
                            Вид события
                        </div>
                        <div class="col-3">
                            Картинка
                        </div>
                        <div class="col-6">
                            Описание
                        </div>
                    </div>

                   


                    <form action="newType.php" method="post" enctype="multipart/form-data">
                        <div class="row" style="min-height: 50px;">
                            <div class="col-3">
                                <input name="Type" type="text" value="<?php echo $Type; ?>" required>
                            </div>
                            <div class="col-3">
                                <input name="file" type="file">
                            </div>
                            <div class="col-6">
                                <textarea style="width: 100%" name="description" type="text"><?php echo $Description; ?></textarea>
                            </div>
                        </div>



                  



                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    </body>

    </html>