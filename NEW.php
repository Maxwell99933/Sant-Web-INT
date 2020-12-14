<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$radio = $_POST['radio'];
$LName = $_POST['LName'];
$FName = $_POST['FName'];
$Who = $_POST['Who'];
$Comment = $_POST['Comment'];

$radio = htmlspecialchars($radio);
$LName = htmlspecialchars($LName);
$FName = htmlspecialchars($FName);
$Who = htmlspecialchars($Who);
$Comment = htmlspecialchars($Comment);

$FName = urldecode($FName);
$radio = urldecode($radio);
$LName = urldecode($LName);
$Who = urldecode($Who);
$Comment = urldecode($Comment);

$FName = trim($FName);
$radio = trim($radio);
$LName = trim($LName);
$Who = trim($Who);
$Comment = trim($Comment);

$WhoNUM = $_POST['WhoNUM'];
$WhoNUM = htmlspecialchars($WhoNUM);
$WhoNUM = urldecode($WhoNUM);
$WhoNUM = trim($WhoNUM);

$TYPENAME = $_POST['TYPENAME'];
$TYPENAME = htmlspecialchars($TYPENAME);
$TYPENAME = urldecode($TYPENAME);
$TYPENAME = trim($TYPENAME);

$middlename = $_POST['middlename'];
$middlename = htmlspecialchars($middlename);
$middlename = urldecode($middlename);
$middlename = trim($middlename);

$IDposet = $_POST['IDposet'];
$IDposet = htmlspecialchars($IDposet);
$IDposet = urldecode($IDposet);
$IDposet = trim($IDposet);


if ($IDposet == ""){
    $IDposet = 'NULL';
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

    $result = $mysqli->query("SELECT Date_EV, Time_EV FROM Events WHERE Id_Events='$radio' ");


    while ($row = mysqli_fetch_array($result)) {
        $Date_EV = $row['Date_EV'];
        $Time_EV = $row['Time_EV'];
    }
    
    if ($result = $mysqli->query("INSERT INTO NOTE_FOR_Events (FName, Id_Events_FK, Who, LName, Comment, WhoNUM, client_id_FK, visit_id ) VALUES ('$FName','$radio','$Who','$LName','$Comment','$WhoNUM', {$IDposet}, '3')")){
        $result = $mysqli->query("UPDATE Events SET Quantity_For_events = Quantity_For_events - 1 WHERE Id_Events = '$radio' ");

?>

<!doctype html>


<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Результат записи</title>
    <style>

    </style>
</head>

<body>
    <div class="container shadow-lg p-3 bg-white rounded" style="max-width: 500px;">
        <div class="row p-2 m-2" style="border-bottom: gray 1px solid;">
            <img src="Logo.svg">
        </div>
        <div class="row p-2 m-2">
            <h4 class="text-center mx-auto">Результат записи</h4>
        </div>

        <div class="row border rounded m-1 p-2">
            <div class="col-12">
                <h6>Запись подтверждена</h6>
            </div>

            <div class="col-6">
                ФИО
            </div>
            <div class="col-6">
                <?php echo $LName;
                echo ' ';
                echo $FName;
                echo ' ';
                echo $middlename;
                 ?>
            </div>

            <div class="col-6">
                Карта №
            </div>
            <div class="col-6">
                <?php if ($IDposet == "NULL"){
                    echo "Новый посетитель";
                } else {
                    echo $IDposet;
                }
                ?>
            </div>

            <div class="col-12">
                Ближайшая запись:
            </div>

            <div class="col-6">
                <?php 
                
                echo $Date_EV;
                Echo " ";
                echo $Time_EV;
                
                ?>
            </div>

            <div class="col-6">
                <?php echo $TYPENAME ?>
            </div>

        </div>

        <form method="POST">


            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input  style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                    <button formaction="FRM.php" type="submit" class="btn btn-block btn-info">Готово</button>
                </div>
            </div>
        </form>






    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php 
    } else {
        echo 'Ошибка! Внести запись не удалось!';
        ?>
        <!doctype html>


<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Ошибка</title>
    <style>

    </style>
</head>

<body>
<div class="container shadow-lg p-3 bg-white rounded" style="max-width: 500px;">
        <form method="POST">


            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input  style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                    <button formaction="FRM.php" type="submit" class="btn btn-block btn-info">Готово</button>
                </div>
            </div>
        </form>
</div>
</body>
</html>
        <?php
    }
    ?>
