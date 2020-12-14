<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$Who = $_POST['Who'];
$Who = htmlspecialchars($Who);
$Who = urldecode($Who);
$Who = trim($Who);

$WhoNUM = $_POST['WhoNUM'];
$WhoNUM = htmlspecialchars($WhoNUM);
$WhoNUM = urldecode($WhoNUM);
$WhoNUM = trim($WhoNUM);

    $db_host = "172.17.0.1";
    $db_user = "homeless";
    $db_password = "12345ghJkbn";
    $db_base = "homeless";
    $db_port = "39410";

    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base,$db_port);

	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("SELECT id, Type, Description, imgname FROM Type WHERE id = 1 OR id = 5");


    while ($row = mysqli_fetch_array($result)) {
        $type_id[] = $row['id'];
        $Type[] = $row['Type'];
        $Description[] = $row['Description'];
        $imgname[] = $row['imgname'];
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

    <title>Новый посетитель</title>
    <style>
                .btnEV{
            margin-bottom: 5%; 
            margin-left: 10%; 
            margin-right: 10%;
        }

        @media (min-width: 576px){
            .btnEV{
            margin-left: 5%; 
        }
        }
    </style>
</head>

<body>
    <div class="container shadow-lg p-3 bg-white rounded">
        <div class="row p-2 m-2" style="border-bottom: gray 1px solid;">
            <img src="Logo.svg">
        </div>
        <div class="row p-2 m-2">
            <h4 class="text-center mx-auto">Новый посетитель</h4>
        </div>

        <?php for($i=0;$i<count($type_id);$i++){ ?>

        <form method="POST">
        <div class="row border rounded m-1 p-2">
                    <div class="col-12 col-sm-4 d-flex justify-content-center">
                    <img src="panel/img/<?php echo $imgname[$i] ?>" style="width: 90%; padding:5%; border-radius: 15%; max-height: 220px;">
                    </div>
                    <div class="col-12 col-sm-8 d-flex">
                        <div class="row" style="width: 100%;">
                        <div class="col-12 align-self-start">
                        <h4 class="text-center text-sm-left" style="margin-right: 5%; margin-left: 5%"><?php echo $Type[$i] ?></h4>
                        </div>
                        <div class="col-12">
                            <h5 class="text-center text-sm-left" style="margin-right: 5%; margin-left: 5%"><?php echo $Description[$i] ?></h5>
                        </div>
                        <div class="col-12 align-self-end btnEV">
                        <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>"> 
                    <input  style="display: none;" name="MPZ" placeholder="Имя" type="text" value="<?php echo $type_id[$i] ?>">
                        <button formaction="FRMNEWZAP.php" type="submit" class="btn btn-block btn-info" style="max-width: 85%">Выбрать</button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>


                <?php } ?>







     


    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>