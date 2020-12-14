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

$MPZ = $_POST['MPZ'];
$MPZ = htmlspecialchars($MPZ);
$MPZ = urldecode($MPZ);
$MPZ = trim($MPZ);

$firstname = $_POST['firstname'];
$firstname = htmlspecialchars($firstname);
$firstname = urldecode($firstname);
$firstname = trim($firstname);

$middlename = $_POST['middlename'];
$middlename = htmlspecialchars($middlename);
$middlename = urldecode($middlename);
$middlename = trim($middlename);

$lastname = $_POST['lastname'];
$lastname = htmlspecialchars($lastname);
$lastname = urldecode($lastname);
$lastname = trim($lastname);

$IDposet = $_POST['IDposet'];
$IDposet = htmlspecialchars($IDposet);
$IDposet = urldecode($IDposet);
$IDposet = trim($IDposet);

    $db_host = "172.17.0.1";
    $db_user = "homeless";
    $db_password = "12345ghJkbn";
    $db_base = "homeless";
    $db_port = "39410";

    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base,$db_port);

	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $result = $mysqli->query("SELECT Id_Events, Quantity_For_events, Date_EV, Time_EV FROM Events WHERE type_id='$MPZ' AND id_status = 2");


    while ($row = mysqli_fetch_array($result)) {
        $Id_Events[] = $row['Id_Events'];
        $Quantity_For_events[] = $row['Quantity_For_events'];
        $Date_EV[] = $row['Date_EV'];
        $Time_EV[] = $row['Time_EV'];
    }


    $resultt = $mysqli->query("SELECT Type FROM Type WHERE id='$MPZ' ");

    while ($row = mysqli_fetch_array($resultt)) {
        $TYPENAME = $row['Type'];
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

    <title>Запись посетителя</title>
    <style>
        .form_radio_btn {
            display: block;
            margin: 1rem !important;
            max-width: 70px;
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
            border-radius: .25rem !important;
        }
        
        .form_radio_btn input[type=radio] {
            display: none;
        }
        
        .form_radio_btn label {
            display: block;
            cursor: pointer;
            padding: 0px 15px;
            line-height: 34px;
            border-radius: 6px;
            user-select: none;
            transition: 0.3s;
        }
        /* Checked */
        
        .form_radio_btn input[type=radio]:checked+label {
            background: #007bff;
            color: #fff;
        }
        /* Hover */
        
        .form_radio_btn label:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175)!important;
            background: #17a2b8;
            color: #f8f9fa;
        }
        
        /* Disabled */
.form_radio_btn input[type=radio]:disabled + label {
	background: #efefef;
	color: #666;
}
    </style>
</head>

<body>
    <div class="container shadow-lg p-3 bg-white rounded">
    <div class="row p-2 m-2" style="border-bottom: gray 1px solid;">
            <img src="Logo.svg">
        </div>
        <div class="row p-2 m-2">
            <h4 class="text-center mx-auto">Запись посетителя</h4>
        </div>


        <form action="NEW.php" method="POST"><!-- Добавить актион добавляющий запись на событие -->
                <div class="row border rounded m-1 p-2">
                    <div class="col-12 col-sm-6">

                        <div class="row">


                            <?php for($i=0;$i<count($Id_Events);$i++){ ?>
                            <div class="col-12">
                                <h5><?php $days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
                                $Mons = array( 1 => "Январь" , "Февраль" , "Март" , "Апрель" , "Май" , "Июнь" , "Июль" , "Август" , "Сентябрь" , "Октябрь" , "Ноябрь" , "Декабрь");
                                echo  $days[date( "N", strtotime($Date_EV[$i]) )]; 
                                echo " , " . date('d', strtotime($Date_EV[$i]) ) . " " ;
                                echo  $Mons[date( "m", strtotime($Date_EV[$i]) )];?></h5>
                                <span>Кол-во мест: <?php echo $Quantity_For_events[$i]; ?></span>
                                <div class="form_radio_btn">
                                    <input id="radio-<?php echo $i; ?>" type="radio" name="radio" required value="<?php echo $Id_Events[$i]; ?>" <?php
                                    if ($Quantity_For_events[$i] == 0){
                                        echo "disabled";
                                    } ?> >
                                    <label for="radio-<?php echo $i; ?>"><?php echo  mb_substr($Time_EV[$i], 0, -3); ?></label>
                                </div>
                                </div>

                            <?php } ?>


                        </div>

                    </div>

                    <div class="col-12 col-sm-6">
                        <h4><?php echo $TYPENAME; ?></h4>
                        <div class="row p-2">
                            <input type="text" required name="FName" placeholder="Имя" value="<?php echo $firstname ?>" style="width: 47.5%;">
                            <div style="width: 5%;"></div>
                            <input type="text" placeholder="Фамилия" name="LName" value="<?php echo $lastname ?>" style="width: 47.5%;">
                        </div>
                        <div class="row p-2">
                            <textarea style="width: 100%;" name="Comment" placeholder="Комментарий"></textarea>
                        </div>

                        <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input  style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                    <input  style="display: none;" name="TYPENAME" type="text" value="<?php echo $TYPENAME ?>">

                    <input  style="display: none;" name="IDposet" type="text" value="<?php echo $IDposet ?>">
                    <input  style="display: none;" name="middlename" type="text" value="<?php echo $middlename ?>">

                        <button type="submit" class="btn btn-primary mx-auto" style="display: block;">Записать</button>
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