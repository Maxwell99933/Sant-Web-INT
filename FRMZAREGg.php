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

$IDposet = $_POST['IDposet'];
$IDposet = htmlspecialchars($IDposet);
$IDposet = urldecode($IDposet);
$IDposet = trim($IDposet);

$FAM = $_POST['FAM'];
$FAM = htmlspecialchars($FAM);
$FAM = urldecode($FAM);
$FAM = trim($FAM);

    $db_host = "172.17.0.1";
    $db_user = "homeless";
    $db_password = "12345ghJkbn";
    $db_base = "homeless";
    $db_port = "39410";

    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base,$db_port);

	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    

    $result = $mysqli->query("SELECT id, Type, Description, imgname FROM Type WHERE id != 1 AND id != 5");


    while ($row = mysqli_fetch_array($result)) {
        $type_id[] = $row['id'];
        $Type[] = $row['Type'];
        $Description[] = $row['Description'];
        $imgname[] = $row['imgname'];
    }


    

if ($IDposet == ""){
    //ПО ФАМ

    $resultt = $mysqli->query("SELECT COUNT(firstname) as total FROM client WHERE lastname LIKE '%$FAM%' ");

    while ($row = mysqli_fetch_array($resultt)) {
        $total = $row['total'];
    }

    if ($total > 1){



        //Получаю данные клиента

$resultt = $mysqli->query("SELECT firstname, id , middlename, lastname FROM client WHERE lastname LIKE '%$FAM%' ");

while ($row = mysqli_fetch_array($resultt)) {
    $firstnamee[] = $row['firstname'];
    $IDposett[] = $row['id'];
    $middlenamee[] = $row['middlename'];
    $lastnamee[] = $row['lastname'];
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

    <title>Выберите клиента</title>
    <style>

    </style>
</head>

<body>
<div class="container shadow-lg p-3 bg-white rounded" style="max-width: 500px;">
    <div class="row">
        <div class="col-1">
            ID
        </div>
        <div class="col-7">
            ФИО
        </div>
        <div class="col-4">
            
        </div>
    </div>

<?php for($i=0;$i<$total;$i++){ 

    ?>
                            
                            
                            <form method="post">  
               <div class="row" style="min-height: 50px;">
                   <div class="col-1">
                       <p><?php echo $IDposett[$i]; ?> <input style="display: none;" type="text" name="IDposet" value="<?php echo $IDposett[$i]; ?>"></p> 
                   </div>
                   <div class="col-7">
                       <p><?php echo $lastnamee[$i]; ?><input style="display: none;" type="text" name="lastname" value="<?php echo $lastnamee[$i]; ?>">

                       <?php echo $firstnamee[$i]; ?> <input style="display: none;" type="text" name="firstname" value="<?php echo $firstnamee[$i]; ?>">
                       

                       <?php echo $middlenamee[$i]; ?><input style="display: none;" type="text" name="middlename" value="<?php echo $middlenamee[$i]; ?>"></p>
                   </div>
                   <div class="col-4">
                   <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input  style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                       <button formaction="FRMZAREGg.php" type="submit" class="btn btn-success">Выбрать</button>
                   </div>
               </div>
               </form> 


                           <?php } ?>

</div>
</body>
</html>


<?php
exit;
    }

        

//Получаю данные клиента
    $resultt = $mysqli->query("SELECT firstname, id , middlename, lastname FROM client WHERE lastname LIKE '%$FAM%' ");

    while ($row = mysqli_fetch_array($resultt)) {
        $firstname = $row['firstname'];
        $IDposet = $row['id'];
        $middlename = $row['middlename'];
        $lastname = $row['lastname'];
    }

    if ($firstname == ""){
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
<div class="container shadow-lg p-3 bg-white rounded mt-5" style="max-width: 500px;">
        <form method="POST">


            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <?php echo '<h4 class="text-center mx-auto text-danger">Ошибка! Посетитель не найден!</h4>'; ?>
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
exit;
    }


    //Нахожу последние записи
    $resultt = $mysqli->query("SELECT Date_enents, Type, visit_id FROM NOTE_FOR_Events INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.id = Events.type_id WHERE client_id_FK = '$IDposet' ORDER BY Date_EV DESC limit 7  ");

    while ($row = mysqli_fetch_array($resultt)) {
        $Date_enents[] = $row['Date_enents'];
        $Type[] = $row['Type'];
        $visit_id[] = $row['visit_id'];
    }


} else{
// ПО ID
//Получаю данные клиента
$resultt = $mysqli->query("SELECT firstname, lastname, middlename FROM client WHERE id='$IDposet' ");

    while ($row = mysqli_fetch_array($resultt)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $middlename = $row['middlename'];
    }



    if ($firstname == ""){
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
<div class="container shadow-lg p-3 bg-white rounded mt-5" style="max-width: 500px;">
        <form method="POST">


            <div class="row mt-4 mb-4">
                <div class="col-12">
                <?php echo '<h4 class="text-center mx-auto text-danger">Ошибка! Посетитель не найден!</h4>'; ?>
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
exit;
    }



//Нахожу последние записи
    $resultt = $mysqli->query("SELECT Id_Note_EVENTS, Date_EV, Type, visit_id FROM NOTE_FOR_Events INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.id = Events.type_id WHERE client_id_FK = '$IDposet' ORDER BY Date_EV DESC limit 7 ");

    while ($row = mysqli_fetch_array($resultt)) {
        $Date_EV[] = $row['Date_EV'];
        $Type[] = $row['Type'];
        $visit_id[] = $row['visit_id'];
        $Id_Note_EVENTS[] = $row['Id_Note_EVENTS'];
    }


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

    <title>Выберите событие</title>

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
            <div class="col-12">
                <h4 class="text-left">Посетитель:</h4>
            </div>
            <div class="col-12">
                <h6>
                <?php echo $lastname;
                echo " ";
                echo  $firstname;
                echo " ";
                echo $middlename;
                ?>
                </h6>
            </div>
            <div class="col-6">
                Карта №
            </div>
            <div class="col-6">
                <?php echo $IDposet; ?>
            </div>
    </div>
    <div class="row p-2 m-2">
            <div class="col-12">
                <h4 class="text-left">История записей:</h4>
            </div>



            <?php for($i=0;$i<count($Id_Note_EVENTS);$i++){ ?>

                <div class="col-6">
                    <?php echo $Date_EV[$i]; ?>
                </div>
                <div class="col-6 <?php If ($visit_id[$i] == 1){ echo "bg-success text-white"; } elseif ($visit_id[$i] == 2){ echo "bg-secondary text-white"; } else { echo "text-dark"; } ?>">
                    <?php echo $Type[$i]; ?>
                </div>
                            <?php } ?>




        </div>
        <div class="row p-2 m-2">
        <div class="col-12">
        <h4 class="text-left">Доступные услуги:</h4>
        </div>
        </div>





        <?php for($i=0;$i<count($type_id);$i++){ ?>

<form method="POST">
<div class="row border rounded m-1 p-2">
            <div class="col-12 col-sm-4 d-flex justify-content-center">
            <img src="panel/img/<?php echo $imgname[$i] ?>" style="width: 90%; padding:5%; border-radius: 15%; max-height: 220px">
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
                    <input  style="display: none;" name="MPZ" type="text" value="2">

                    <input  style="display: none;" name="firstname" type="text" value="<?php echo $firstname ?>">
                    <input  style="display: none;" name="IDposet" type="text" value="<?php echo $IDposet ?>">
                    <input  style="display: none;" name="middlename" type="text" value="<?php echo $middlename ?>">
                    <input  style="display: none;" name="lastname" type="text" value="<?php echo $lastname ?>">
                    <button formaction="FRMNEWZAP.php" type="submit" class="btn btn-block btn-info" style="max-width: 80%">Выбрать</button>
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