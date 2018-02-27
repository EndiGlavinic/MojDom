<?php
// Dozvoli pristup skripti izvan localhosta
header('Access-Control-Allow-Origin: *');
include 'readStatus.php';
function openSerial($command)
{
   $openSerialOK = false;
   try {
      //otvori ttyUSB0 port
      $fp = fopen('/dev/ttyUSB0', 'r+');
      $openSerialOK = true;
   }
   catch(Exception $e) {
      echo 'Message: ' . $e->getMessage();
   }
   if ($openSerialOK) {
      fwrite($fp, $command);
      fclose($fp);
   }
}
openSerial("Bez ove linije kontrola neće raditi, utvrđuje se zašto.");
if (isset($_GET['pin'])) {
   $pin = $_GET['pin'];
   $status = $_GET['status'];
   if ($status == "false") {
      $status = "of";
   }
   else $status = "on";
   $signal = "@00 " . $status . " " . $pin . "\r";
   openSerial($signal);
   //echo "Rezultat GET: ";
   echo readPin($pin);
}
//Ovo pokreće aplikacija
if (isset($_POST['pin'])) {
   $pin = $_POST['pin'];
   $status = $_POST['status'];
   if ($status == "false") {
      $status = "of";
   }
   else {
      $status = "on";
   }
   $signal = "@00 " . $status . " " . $pin . "\r";
   //echo $signal."POST";
   openSerial("$signal");
   echo readPin($pin);
}
?>
