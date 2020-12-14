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
    
    $result = $mysqli->query("SELECT id, Type, Description FROM Type ");


    while ($row = mysqli_fetch_array($result)) {
        $type_id[] = $row['id'];
        $Type[] = $row['Type'];
        $Description[] = $row['Description'];
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

    <title>Виды событий</title>
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
                        <h4>Виды событий</h4>
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
                    <div class="col-1">
                        ID
                    </div>
                    <div class="col-3">
                        Вид события
                    </div>
                    <div class="col-4">
                        Описание
                    </div>
                    <div class="col-4">
                    </div>
                </div>

                <?php for($i=0;$i<count($type_id);$i++){ ?>
                                
                                
                    <form method="post">        
                <div class="row" style="min-height: 50px;">
                    <div class="col-1">
                        <?php echo $type_id[$i]; ?>
                        <input style="display: none;" type="text" name="type_id" value="<?php echo $type_id[$i]; ?>">
                    </div>
                    <div class="col-3">
                        <?php echo $Type[$i]; ?>
                        <input style="display: none;" type="text" name="EventTypeName" value="<?php echo $Type[$i]; ?>">
                    </div>
                    <div class="col-4">
                        <?php echo $Description[$i]; ?>
                        <input style="display: none;" type="text" name="Description" value="<?php echo $Description[$i]; ?>">
                    </div>
                    <div class="col-4">
                        <button formaction="Panel Edit Type.php" type="submit" class="btn btn-info">Редактировать</button>
                        <button formaction="DeletType.php" type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
                </form> 


                            <?php } ?>

                
            
                            <a href="Panel New Type.php" type="button" class="btn btn-primary">Добавить</a>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>