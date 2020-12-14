<?php
include_once('functions.php');

$Type = $_POST['Type'];
$description = $_POST['description'];



$Type = htmlspecialchars($Type);
$description = htmlspecialchars($description);



$Type = urldecode($Type);
$description = urldecode($description);



$Type = trim($Type);
$description = trim($description);




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




    // если была произведена отправка формы
    if(isset($_FILES['file'])) {
        // проверяем, можно ли загружать изображение
        $check = can_upload($_FILES['file']);
      
        if($check === true){
          // загружаем изображение на сервер
          //make_upload($_FILES['file']);
  
          $file = ($_FILES['file']);
  
          $name = mt_rand(0, 10000) . $file['name'];
          copy($file['tmp_name'], 'img/' . $name);
          echo "<strong>Файл успешно загружен!</strong>";
        }
        else{
          // выводим сообщение об ошибке
          echo "<strong>$check</strong>";  
        }
      }



    
    $result = $mysqli->query("INSERT INTO Type ( Type, description, imgname) VALUES ('$Type','$description','$name')");

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel Type.php");}
window.setTimeout("changeurl();",50);
</script>