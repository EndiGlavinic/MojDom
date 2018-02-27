<?php
session_start();
$idkorisnika = 0;
if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] != "1986f46d5ebf79abf419823b06ccc66b") {
    	unset($_SESSION['id']);
    	header('Location: ../index.php');
    	}
} else {
    header('Location: ../index.php');
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<link href="inc/css/style.css" rel="stylesheet" />
	<script src="inc/js/jquery.min.js"></script>
	<script src="inc/js/jquery.knob.min.js"></script>
<script src="inc/js/knob.helper.js"></script>
<script src="inc/js/komunikacija.js"></script>
<style type="text/css">
	body {
   transform: scale(1.1);
   transform-origin: 0 0;
	}
</style>
</head>
<body>
	<div style="position: fixed;
   top: 60%;
   left: 50%;
   transform: translate(-50%, -50%);">
	<div class="modal fade" id="mojModal1Okvir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div  class="modal-dialog" style="width: 380px" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div id="mojModal1" class="modal-body">
					<script type="text/javascript" src="inc/js/jquery.wheelcolorpicker.js"></script>
					<link type="text/css" rel="stylesheet" href="inc/css/wheelcolorpicker.css" />
					<input id="color" type="text" data-wheelcolorpicker data-wcp-sliders="wv"  data-wcp-layout="block"  data-wcp-autoResize="false" data-wcp-cssClass="color-block"/>
					<style type="text/css">
						.color-block {
								width: 350px;
								height: 250px;
						}
					</style>
					<script type="text/javascript">
						$(function() {
							$( ".color-block" ).on('sliderup', function() {
								//n bira slajder a proslijeđuje se iz forme pomoću data-id
								n = ($("#mojModal1Okvir").val());
								boja = $('#color').wheelColorPicker('getValue');
								//$( "body" ).css('background-color','#'+boja);
								$('#slider'+n).trigger('configure', {'fgColor':'#'+boja});
								$("#mojModal1Okvir").modal('hide')

							});
							$( ".color-block" ).on('slidermove', function() {
								boja = $('#color').wheelColorPicker('getValue');
								$("#mojModal1").css('background-color','#'+boja);
							});
						});
					</script>
	      </div>
	    </div>
	  </div>
	</div>
	<ul id="navigacija" class="nav nav-tabs light" style="width: 640px;">
    <li class="active"><a data-toggle="tab" href="#dnevni">Dnevni boravak</a></li>
    <li><a data-toggle="tab" href="#kupatilo">Kupatilo</a></li>
    <li class="disabled"><a data-toggle="tab" href="#soba">Soba</a></li>
    <li class="disabled"><a data-toggle="tab" href="#podrum">Podrum</a></li>
		<li class="disabled"><a data-toggle="tab" href="#vani">Vani</a></li>

		<li style="float: right; width: 43; height: 43;"><a id="tema"><img src="inc/img/theme.png" align="middle" width="30" height="30" border="0" align-content="center"></a></li>
	</ul>

  <div id="clock" class="light lft">
		<div class="display">
			<div class="weekdays"></div>
			<div class="ampm"></div>
			<div class="alarm"></div>
			<div class="digits"></div>
		</div>
		<div style="top: 10px; left: -40px; position: relative;">
		<div class="slider" id="sl1"  style="left: 50px; position: absolute;">
			<!--canvas width="10px" id="sl1can" height="10px"></canvas-->
		  <input class="knob" id="slider1"  style="position: absolute; left: 175px; top: 5px;" value="35" data-angleoffset="-125" data-width="170" data-anglearc="250" data-id="1">
						</script>
		</div>
	  <div class="slider"  id="sl2" style="left: 240px; position: absolute;">
		<!--canvas width="10px" id="sl2can" height="10px"></canvas-->
		  <input class="knob" id="slider2" style="position: absolute; left: 175px; top: 5px;" value="35" data-angleoffset="-125" data-width="170" data-anglearc="250" data-id="2">
		</div>
	</div>
	</div>

	<!--div id="desno" class="light button-holder rgt" >
		<div id="duplo" class="dark" style="width:92%; float: right; border:0px solid #fff; padding:0 6;text-decoration: none !important;">
			<div id="rollabel" class="dark" style="background-color: #66ee66; width: 98%; font-weight: bold;">Rolete</div>
		<a class="button" style="width:48%; border:1px solid; float:left; padding:10 0;" id="15">GORE</a>
		<a class="button" style="width:48%; border:1px solid; float:left; padding:10 0;" id="14">DOLJE</a>
	 </div>
		<a class="button" id="13">Hodnik</a>
		<a class="button" name="prekidac1" id="prekidac1">Kupatilo</a>
		<a class="button" name="prekidac1" id="pSoba">Soba</a>
		<a class="button" id="tema">Promijeni temu</a>
		<div class="btn-group dark" role="group" aria-label="Basic example">
  <a type="button" class="btn btn-secondary">Left</a>
  <a type="button" class="btn btn-secondary">Right</a>
</div>
	</div-->
		<div id="desno" class="light button-holder rgt" >

			<!--div class="btn-group" role="group">
    <button id="ddProstor" type="button" class="btn btn-warning btn-block dropdown-toggle" style="width: 150px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Prostorija
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item btn btn-info btn-block" selected href="#">Dnevni</a>
      <a class="dropdown-item btn btn-info btn-block" href="#">Soba</a>
			<a class="dropdown-item btn btn-info btn-block" href="#">WC</a>
			<a class="dropdown-item btn btn-info btn-block" href="#">Podrum</a>
			<a class="dropdown-item btn btn-info btn-block" href="#">Vani</a>
    </div>
  </div-->

	<div class="tab-content">
		<div id="dnevni" class="tab-pane fade in active">
			<div class="btn-group" role="group" style="width: 150px; text-align: center;" aria-label="Basic example">
				<div class="dark">Rolete</div>
				<button id="dbr1g" type="button" class="btn btn-info btn-lg" style="width: 75px; border-radius:0;">Gore</button>
				<button id="dbr1d" type="button" class="btn btn-info btn-lg" style="width: 75px; border-radius:0;">Dolje</button>
			</div>
			<div class="btn-group-vertical" role="group" style="width: 150px;" aria-label="Button group with nested dropdown">
				Svijetla
			  <button type="button" id="dbsv1" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true" autocomplete="off">Glavno</button>
			  <button type="button" id="dbsv2" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true">Kuhinja</button>
			  <button type="button" id="dbsv3" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true">Ambijentalno</button>
				Ostalo
				<button type="button" id="dbsv4" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true">Grijanje</button>


			</div>
		</div>
	  <div id="kupatilo" class="tab-pane fade">

			<div class="btn-group-vertical" role="group" style="width: 150px;" aria-label="Button group with nested dropdown">
				Svijetla
				<button type="button" id="kusv1" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true" autocomplete="off">Glavno</button>
				<button type="button" id="kusv2" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true">Ogledalo</button>
				Ostalo
				<button type="button" id="kusv3" class="btn btn-info btn-lg btn-block" style="background: solid;"  data-toggle="button" aria-pressed="true">Grijanje</button>


			</div>
	  </div>
		<div id="soba" class="tab-pane fade">
	    <h3>Soba</h3>
	    <p>Dodati komande sobe.</p>
	  </div>
		<div id="podrum" class="tab-pane fade">
			<h3>Podrum</h3>
			<p>Dodati komande podruma.</p>
		</div>
		<div id="vani" class="tab-pane fade">
			<h3>Vani</h3>
			<p>Dodati komande vanjskih naprava.</p>
		</div>

		</div>
	</div>
</div>
	<!-- JavaScript Includes -->
	<!--script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script-->
	<script src="inc/js/moment.min.js"></script>
	<script src="inc/js/script.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="inc/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="inc/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="inc/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
