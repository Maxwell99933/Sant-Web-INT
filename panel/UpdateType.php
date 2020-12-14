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

    $file = ($_FILES['file']);

    if($file['name'] == ''){
        echo "<strong>Картинка не обновлена</strong>";
    $result = $mysqli->query("UPDATE Type SET Type = '$Type', Description = '$description'  WHERE id = '$type_id' ");

} else {
    echo "<strong>Картинка обновлена!</strong>";




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

    $result = $mysqli->query("UPDATE Type SET Type = '$Type', Description = '$description', imgname = '$name'  WHERE id = '$type_id' ");





}

?>

<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="Panel Type.php");}
window.setTimeout("changeurl();",50);
</script>