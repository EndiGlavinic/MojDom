<?php
// Dozvoli pristup skripti izvan localhosta
header('Access-Control-Allow-Origin: *');
$id = null;
/*function openSerial($command)
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
}*/
// Postaviti i
function readPin($sentID){
  $id=$sentID;
  echo getPinStatus($id);
}

function getPinStatus($id){
  require("php_serial.class.php");
    $serial = new phpSerial();
    $serial->deviceSet("/dev/ttyUSB0");
    $serial->confBaudRate(9600);
    $serial->confParity("none");
    $serial->confCharacterLength(8);
    $serial->confFlowControl("none"); 
    $signal = "@00 RS " . $id . "\r";
 $serial->deviceOpen();
    exec("echo ".$signal." > /dev/ttyUSB0");
    sleep(1);
    $read = $serial->readPort();
   return $read;
}
//čitati post
if (isset($_POST['id'])) {
   $id = $_POST['id'];
}

//čitati get
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

if ($id != null){
  echo getPinStatus($id);
 }
?>