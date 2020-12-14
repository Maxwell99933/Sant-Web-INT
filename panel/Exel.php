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

$EventType = $_POST['EventType'];
$EventType = htmlspecialchars($EventType);
$EventType = urldecode($EventType);
$EventType = trim($EventType);

$Data = $_POST['Data'];
$Data = htmlspecialchars($Data);
$Data = urldecode($Data);
$Data = trim($Data);

$DataTwo = $_POST['DataTwo'];
$DataTwo = htmlspecialchars($DataTwo);
$DataTwo = urldecode($DataTwo);
$DataTwo = trim($DataTwo);

If ($DataTwo == ''){
    If ($EventType == '123999'){
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE Date_EV = '$Data' ");
    }else{
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE type_id = '$EventType' AND Date_EV = '$Data' ");
    } 
} else{
    If ($EventType == '123999'){
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE Date_EV >= '$Data' AND Date_EV <= '$DataTwo' ");
    }else{
        $result = $mysqli->query("SELECT Date_EV, Time_EV, Type, visit_id, visit, Id_Note_EVENTS, Id_Events_FK, client_id_FK, FName, LName, Who, WhoNUM, Comment FROM NOTE_FOR_Events INNER JOIN visit ON NOTE_FOR_Events.visit_id = visit.Id INNER JOIN Events ON NOTE_FOR_Events.Id_Events_FK = Events.Id_Events INNER JOIN Type ON Type.Id = Events.type_id WHERE type_id = '$EventType' AND Date_EV >= '$Data' AND Date_EV <= '$DataTwo' ");
    }
}




while ($row = mysqli_fetch_array($result)) {
    $Id_Note_EVENTS[] = $row['Id_Note_EVENTS'];
    $Id_Events_FK[] = $row['Id_Events_FK'];
    $client_id_FK[] = $row['client_id_FK'];
    $FName[] = $row['FName'];
    $LName[] = $row['LName'];
    $Who[] = $row['Who'];
    $WhoNUM[] = $row['WhoNUM'];
    $Comment[] = $row['Comment'];
    $visit[] = $row['visit'];
    $visit_id[] = $row['visit_id'];
    $Type[] = $row['Type'];
    $Date_EV[] = $row['Date_EV'];
    $Time_EV[] = $row['Time_EV'];
}






require_once __DIR__ . '/PHPExcel/PHPExcel/Classes/PHPExcel.php';
require_once __DIR__ . '/PHPExcel/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
 
$xls = new PHPExcel();


$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('Список');

// Формат
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
 
// Ориентация
// ORIENTATION_PORTRAIT — книжная
// ORIENTATION_LANDSCAPE — альбомная
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
 
// Поля
$sheet->getPageMargins()->setTop(1);
$sheet->getPageMargins()->setRight(0.75);
$sheet->getPageMargins()->setLeft(0.75);
$sheet->getPageMargins()->setBottom(1);




$sheet->setCellValue("A1", "Дата");
$sheet->setCellValue("B1", "Время");
$sheet->setCellValue("C1", "Фамилия");
$sheet->setCellValue("D1", "Имя");
$sheet->setCellValue("E1", "Событие");
$sheet->setCellValue("F1", "Комментарий");
$sheet->setCellValue("G1", "Кто записал");
$sheet->setCellValue("H1", "Телеф.записавшего");
$sheet->setCellValue("I1", "Статус");





 for ($i = 0; $i < count($Id_Note_EVENTS); $i++) {

	$z = $i + 2;

	$sheet->setCellValue('A'.$z, $Date_EV[$i]);
	$sheet->setCellValue('B'.$z, $Time_EV[$i]);
	$sheet->setCellValue('C'.$z, $LName[$i]);
	$sheet->setCellValue('D'.$z, $FName[$i]);
	$sheet->setCellValue('E'.$z, $Type[$i]);
	$sheet->setCellValue('F'.$z, $Comment[$i]);
	$sheet->setCellValue('G'.$z, $Who[$i]);
	$sheet->setCellValue('H'.$z, $WhoNUM[$i]);
	$sheet->setCellValue('I'.$z, $visit[$i]);



}


header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=file.xlsx");
 
$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('php://output'); 
exit();	

?>