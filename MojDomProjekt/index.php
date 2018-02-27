<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] == "1986f46d5ebf79abf419823b06ccc66b") {
    	unset($_SESSION['id']);
    	header('Location: dom/index.php');
    	}
    }

if(isset($_POST[ime])&&isset($_POST[lozinka])){
	if($_POST[ime] == "Medulinska"){
		if($_POST[lozinka] == "1986f46d5ebf79abf419823b06ccc66b"){
			$_SESSION['id'] = $_POST[lozinka];
			header('Location: dom/index.php');
		}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MojDom Prijava</title>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<style>

body {
	background-color: #e3e7ed;
	background-size: cover;
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
}

#iosBlurBg {
	resize: horizontal;
	position: relative;
	/*width: 100%;
	height: 100vh;*/
	border-top: 450px solid transparent;
	border-left: 550px solid rgba(0,0,0,0.04);
	border-bottom: 450px solid transparent;
	background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1));
	/*box-shadow: 1px 1px 25px #999;*/
}

#whiteBg {
	resize: horizontal;
	position: absolute;
	top: -410px;
	right: 0;
	border-top: 410px solid transparent;
	border-left: 505px solid rgba(255,255,255,1);
	border-bottom: 410px solid transparent;
	border-right: 30px solid transparent;
	background: linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 1));
}

#bottomEnter{
	position: absolute;
	top: 500px;
	left: 150px;
	z-index: -2;
	border-top: 200px solid transparent;
	border-right: 300px solid #15224a;
	border-bottom: 150px solid transparent;
	transform: rotate(-2deg);
}

#bottomBlurBg{
	position: absolute;
	top: 490px;
	left: 110px;
	z-index: -1;
	border-top: 200px solid transparent;
	border-right: 260px solid rgba(69,138,182,0.4);
	border-bottom: 120px solid transparent;
	transform: rotate(10deg);
}

.enterButton{
	position: absolute;
	top: 660px; 
	left: 330px;
	width: 70px;
	height: 70px;
	text-align: center;
}

.text-white{
	color: #fff;
}

.enterText{
	text-transform: uppercase;
	font-size: 20px;
	font-weight: 300;
	font-family: 'Open Sans', sans-serif;
}

.loginForm{
	position: absolute;
	top: 300px;
	left: 70px;
}

.title{
	 font-weight: 300;
	 font-size: 24px;
	 line-height: 1;
}

.title span{
	font-weight: 800;
	/*letter-spacing: 3px;*/
}

.title hr{
	width: 150px;
	border-width: 2px;
	border-color: #67e2fb; 
	margin: 0;

}

hr.short{
	width: 50px;
	border-width: 2px;
	border-color: #67e2fb; 
	float: left;
	margin: 0;

}


/*= input focus effects css
=========================== */
:focus{outline: none;}

.col-3{float: left; width: 100%; margin-top: 20px; margin-bottom: 0;} 
input{margin-top: 15px;font: 15px/24px "Open Sans", sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px; width: 65%;}

input::placeholder{
	text-transform: uppercase;
	letter-spacing: 0;
	font-size: 20px;
	font-weight: 300;
	padding-left: 15px;
}

.effect-2{border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;}

.forget button{
	margin-top: 50px;
	border-radius: 0;
	color: #aaa;
	margin-left: 50px;
	font-weight: 700;
}

</style>
<script type="text/javascript">
$( "#ulazButton" ).click(function() {
  $( "#loginForma" ).submit();
});
var MD5 = function(s){function L(k,d){return(k<<d)|(k>>>(32-d))}function K(G,k){var I,d,F,H,x;F=(G&2147483648);H=(k&2147483648);I=(G&1073741824);d=(k&1073741824);x=(G&1073741823)+(k&1073741823);if(I&d){return(x^2147483648^F^H)}if(I|d){if(x&1073741824){return(x^3221225472^F^H)}else{return(x^1073741824^F^H)}}else{return(x^F^H)}}function r(d,F,k){return(d&F)|((~d)&k)}function q(d,F,k){return(d&k)|(F&(~k))}function p(d,F,k){return(d^F^k)}function n(d,F,k){return(F^(d|(~k)))}function u(G,F,aa,Z,k,H,I){G=K(G,K(K(r(F,aa,Z),k),I));return K(L(G,H),F)}function f(G,F,aa,Z,k,H,I){G=K(G,K(K(q(F,aa,Z),k),I));return K(L(G,H),F)}function D(G,F,aa,Z,k,H,I){G=K(G,K(K(p(F,aa,Z),k),I));return K(L(G,H),F)}function t(G,F,aa,Z,k,H,I){G=K(G,K(K(n(F,aa,Z),k),I));return K(L(G,H),F)}function e(G){var Z;var F=G.length;var x=F+8;var k=(x-(x%64))/64;var I=(k+1)*16;var aa=Array(I-1);var d=0;var H=0;while(H<F){Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=(aa[Z]| (G.charCodeAt(H)<<d));H++}Z=(H-(H%4))/4;d=(H%4)*8;aa[Z]=aa[Z]|(128<<d);aa[I-2]=F<<3;aa[I-1]=F>>>29;return aa}function B(x){var k="",F="",G,d;for(d=0;d<=3;d++){G=(x>>>(d*8))&255;F="0"+G.toString(16);k=k+F.substr(F.length-2,2)}return k}function J(k){k=k.replace(/rn/g,"n");var d="";for(var F=0;F<k.length;F++){var x=k.charCodeAt(F);if(x<128){d+=String.fromCharCode(x)}else{if((x>127)&&(x<2048)){d+=String.fromCharCode((x>>6)|192);d+=String.fromCharCode((x&63)|128)}else{d+=String.fromCharCode((x>>12)|224);d+=String.fromCharCode(((x>>6)&63)|128);d+=String.fromCharCode((x&63)|128)}}}return d}var C=Array();var P,h,E,v,g,Y,X,W,V;var S=7,Q=12,N=17,M=22;var A=5,z=9,y=14,w=20;var o=4,m=11,l=16,j=23;var U=6,T=10,R=15,O=21;s=J(s);C=e(s);Y=1732584193;X=4023233417;W=2562383102;V=271733878;for(P=0;P<C.length;P+=16){h=Y;E=X;v=W;g=V;Y=u(Y,X,W,V,C[P+0],S,3614090360);V=u(V,Y,X,W,C[P+1],Q,3905402710);W=u(W,V,Y,X,C[P+2],N,606105819);X=u(X,W,V,Y,C[P+3],M,3250441966);Y=u(Y,X,W,V,C[P+4],S,4118548399);V=u(V,Y,X,W,C[P+5],Q,1200080426);W=u(W,V,Y,X,C[P+6],N,2821735955);X=u(X,W,V,Y,C[P+7],M,4249261313);Y=u(Y,X,W,V,C[P+8],S,1770035416);V=u(V,Y,X,W,C[P+9],Q,2336552879);W=u(W,V,Y,X,C[P+10],N,4294925233);X=u(X,W,V,Y,C[P+11],M,2304563134);Y=u(Y,X,W,V,C[P+12],S,1804603682);V=u(V,Y,X,W,C[P+13],Q,4254626195);W=u(W,V,Y,X,C[P+14],N,2792965006);X=u(X,W,V,Y,C[P+15],M,1236535329);Y=f(Y,X,W,V,C[P+1],A,4129170786);V=f(V,Y,X,W,C[P+6],z,3225465664);W=f(W,V,Y,X,C[P+11],y,643717713);X=f(X,W,V,Y,C[P+0],w,3921069994);Y=f(Y,X,W,V,C[P+5],A,3593408605);V=f(V,Y,X,W,C[P+10],z,38016083);W=f(W,V,Y,X,C[P+15],y,3634488961);X=f(X,W,V,Y,C[P+4],w,3889429448);Y=f(Y,X,W,V,C[P+9],A,568446438);V=f(V,Y,X,W,C[P+14],z,3275163606);W=f(W,V,Y,X,C[P+3],y,4107603335);X=f(X,W,V,Y,C[P+8],w,1163531501);Y=f(Y,X,W,V,C[P+13],A,2850285829);V=f(V,Y,X,W,C[P+2],z,4243563512);W=f(W,V,Y,X,C[P+7],y,1735328473);X=f(X,W,V,Y,C[P+12],w,2368359562);Y=D(Y,X,W,V,C[P+5],o,4294588738);V=D(V,Y,X,W,C[P+8],m,2272392833);W=D(W,V,Y,X,C[P+11],l,1839030562);X=D(X,W,V,Y,C[P+14],j,4259657740);Y=D(Y,X,W,V,C[P+1],o,2763975236);V=D(V,Y,X,W,C[P+4],m,1272893353);W=D(W,V,Y,X,C[P+7],l,4139469664);X=D(X,W,V,Y,C[P+10],j,3200236656);Y=D(Y,X,W,V,C[P+13],o,681279174);V=D(V,Y,X,W,C[P+0],m,3936430074);W=D(W,V,Y,X,C[P+3],l,3572445317);X=D(X,W,V,Y,C[P+6],j,76029189);Y=D(Y,X,W,V,C[P+9],o,3654602809);V=D(V,Y,X,W,C[P+12],m,3873151461);W=D(W,V,Y,X,C[P+15],l,530742520);X=D(X,W,V,Y,C[P+2],j,3299628645);Y=t(Y,X,W,V,C[P+0],U,4096336452);V=t(V,Y,X,W,C[P+7],T,1126891415);W=t(W,V,Y,X,C[P+14],R,2878612391);X=t(X,W,V,Y,C[P+5],O,4237533241);Y=t(Y,X,W,V,C[P+12],U,1700485571);V=t(V,Y,X,W,C[P+3],T,2399980690);W=t(W,V,Y,X,C[P+10],R,4293915773);X=t(X,W,V,Y,C[P+1],O,2240044497);Y=t(Y,X,W,V,C[P+8],U,1873313359);V=t(V,Y,X,W,C[P+15],T,4264355552);W=t(W,V,Y,X,C[P+6],R,2734768916);X=t(X,W,V,Y,C[P+13],O,1309151649);Y=t(Y,X,W,V,C[P+4],U,4149444226);V=t(V,Y,X,W,C[P+11],T,3174756917);W=t(W,V,Y,X,C[P+2],R,718787259);X=t(X,W,V,Y,C[P+9],O,3951481745);Y=K(Y,h);X=K(X,E);W=K(W,v);V=K(V,g)}var i=B(Y)+B(X)+B(W)+B(V);return i.toLowerCase()};
</script>
</head>
<head>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
  			<div id="iosBlurBg">
  				<div id="whiteBg"></div>
  			</div>
  			<div id="bottomEnter"></div>
  			<div id="bottomBlurBg"></div>
  			<!-- Forma za prijavu -->
  			<div class="loginForm">
  				<div class="title">
  					<p>Prijava u<br><span>MojDom</span></p>
  					<hr>
  					<hr class="short">
  				</div>
  				<form id="loginForma" action='index.php' method="POST">
  					<div class="col-3">
			        	<input id="ime" name="ime" class="effect-2" type="text" placeholder="Prijava...">
			            <span class="focus-border"></span>

			            <input id="pass" name="pass" class="effect-2" type="password" placeholder="Lozinka..." onkeyup='if($("#pass").val() != ""){$("#lozinka").val((MD5($("#pass").val())))};'>
			            <input id="lozinka" name="lozinka" class="effect-2" type="hidden">
			            <span class="focus-border"></span>
			        </div>

			        <!--div class="forget">
			        	<button class="btn btn-default btn-sm">FORGOT PASSWORD?</button>
			        </div-->

  				</form>
  			</div>
  			
  				<div id="ulazButton" class="enterButton" onclick='$("#loginForma" ).submit();'>
	  				<i class="fa fa-lock fa-2x text-white"></i><br>
	  				<span class="enterText text-white">ULAZ</span>
	  			</div>
  			
		</div>
	</div>
</div>
</head>
</html>