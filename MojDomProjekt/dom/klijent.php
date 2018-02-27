<?php

/*
    Simple php udp socket client
*/

//Reduce errors
error_reporting(~E_WARNING);

$server = '127.0.0.1';
$port = 9999;

if(!($sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Ne mogu napraviti spojnu točku (udp socket): [$errorcode] $errormsg \n");
}

//echo "Pristupna točka kreirana.  \n";

//Communication loop
//while(1)
//{
  if(isset($_POST['id'])) {
    $komanda = $_POST['id'];
    $value = "";
    if(isset($_POST['val'])) $value = $_POST['val'];
    //echo $komanda;
    unset($_POST['id']);
  } else {echo "ništa";}
    //Take some input to send
    //echo 'Upiši poruku za slanje : ';
    //$input = fgets(STDIN);
    $input = $komanda.";".$value;
    //Send the message to the server
    if( ! socket_sendto($sock, $input , strlen($input) , 0 , $server , $port))
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        die("Ne mogu poslati podatke: [$errorcode] $errormsg \n");
    }

    //Now receive reply from server and print it
    if(socket_recv ( $sock , $reply , 2045 , MSG_WAITALL ) === FALSE)
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);

        die("Ne mogu primiti podatke: [$errorcode] $errormsg \n");
    }

    echo "$reply";
//}
