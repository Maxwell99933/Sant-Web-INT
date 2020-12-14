<?php 

$Who = $_POST['Who'];
$Who = htmlspecialchars($Who);
$Who = urldecode($Who);
$Who = trim($Who);

$WhoNUM = $_POST['WhoNUM'];
$WhoNUM = htmlspecialchars($WhoNUM);
$WhoNUM = urldecode($WhoNUM);
$WhoNUM = trim($WhoNUM);

?>
<!doctype html>


<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Тип посетителя</title>
    <style>

    </style>
</head>

<body>
    <div class="container shadow-lg p-3 bg-white rounded" style="max-width: 500px;">
        <div class="row p-2 m-2" style="border-bottom: gray 1px solid;">
            <img src="Logo.svg">
        </div>
        <div class="row p-2 m-2">
            <h4 class="text-center mx-auto">Выберите тип посетителя:</h4>
        </div>

        <ul class="nav nav-tabs">
            <!-- Первая вкладка (активная) -->
            <li class="nav-item" style="width: 50%;">
                <a class="nav-link active" data-toggle="tab" href="#description">Зарегистрированный <br> посетитель</a>
            </li>
            <!-- Вторая вкладка -->
            <li class="nav-item" style="width: 50%;">
                <!--<a class="nav-link" data-toggle="tab" href="#characteristics">Новый <br> посетитель</a> -->

                <form method="post">

                    <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                        <button formaction="FRMNEW.php" type="submit" class="btn btn-block btn-info">Новый <br> посетитель</button>


                </form>

            </li>
        </ul>

        <!-- Блоки с контентом -->
        <div class="tab-content">
            <!-- Первый блок (он отображается по умолчанию, т.к. имеет классы show и active) -->
            <div class="tab-pane fade show active border" id="description">
            <form method="post">
                <div class="row mx-1 my-4">
                    <div class="col-12 col-sm-6">
                        <h6>Карта №</h6>
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" name="IDposet">
                    </div>
                </div>
                <div class="row mx-1 my-4">
                    <div class="col-12 col-sm-6">
                        <h6>или Фамилия</h6>
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="text" name="FAM">
                    </div>
                </div>

                <div class="row mx-1 my-4">
                    <div class="col-12">
                    <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                        <button formaction="FRMZAREGg.php" type="submit" class="btn btn-block btn-info">Найти посетителя</button>
                    </div>
                </div>

                </form>
            </div>
            <!-- Второй блок -->
            <div class="tab-pane fade border" id="characteristics">
                <form method="post">

                <div class="row mx-1 my-4">
                    <div class="col-12">
                    <input style="display: none;" name="WhoNUM" placeholder="Номер" type="text" value="<?php echo $WhoNUM ?>">
                    <input style="display: none;" name="Who" placeholder="Имя" type="text" value="<?php echo $Who ?>">
                        <button formaction="FRMNEW.php" type="submit" class="btn btn-block btn-info">К событиям</button>
                    </div>
                </div>

                </form>
            </div>
        </div>






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