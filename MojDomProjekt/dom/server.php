<?php

// Reduce errors

error_reporting(~E_WARNING);

// Array lampa definira max broj trošila

$lampa = array(0,0,0,0,0,0);

function paliGasi($uredjaj, $lampa)
{
	$oper = $uredjaj;
	$br = $uredjaj;
	$buf = "";
	$lampa[$br] = !$lampa[$br];
	if ($lampa[$br] == 1) {
		echo "Uredjaj " . $oper . "-> \033[01;32mUključeno!\033[0m\n";
		$buf = 'OK1';
	}
	else {
		echo "Uredjaj " . $oper . "-> \033[01;31mIsključeno!\033[0m\n";
		$buf = 'OK0';
	}

	return array(
		$lampa,
		$buf
	);
}

// Create a UDP socket

if (!($sock = socket_create(AF_INET, SOCK_DGRAM, 0))) {
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);
	die("Ne mogu utvoriti spojnu točku (udp socket): [$errorcode] $errormsg \n");
}

echo "Pristupna točka otvorena. \n";

// Bind the source address

if (!socket_bind($sock, "0.0.0.0", 9999)) {
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);
	die("Ne mogu povezati spojnu točku sa zadanom adresom : [$errorcode] $errormsg \n");
}

echo "Spojna točka uspješno povezana \n";

// Do some communication, this loop can handle multiple clients

while (1) {

	// echo "Čekam podatke ... \n";
	// Receive some data

	$r = socket_recvfrom($sock, $buf, 512, 0, $remote_ip, $remote_port);

	// echo "$remote_ip : $remote_port -- |" . $buf . "|";

	$buftemp = explode(";", $buf);
	$oper = $buftemp[0];
	$val = $buftemp[1];

	// Spremanje returna funkcije paliGasi u array dvije vrijednosti

	$dvijevrijdnosti = paliGasi($oper, $lampa);
	$lampa = $dvijevrijdnosti[0];
	$buf = $dvijevrijdnosti[1];
	if ($oper == "sl1") {
		echo "Slider 1: " . $val . "\n";
		$buf = "OK";
	}

	if ($oper == "sl2") {
		echo "Slider 2: " . $val . "\n";
		$buf = "OK";
	}

	// Send back the data to the client

	socket_sendto($sock, $buf, 100, 0, $remote_ip, $remote_port);
}

socket_close($sock);
