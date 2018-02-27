$(document).ready(function() {
var rolMaster = 1;
var rolGorDol = 2;
var svWc      = 3;
var svDnevni  = 4;
var svKuhinja = 5;
var svAmbijent= 6;
var grijDnevni= 7;
var grijWc    = 8;
    function ucitajSve(){
        $.post('../readStatus.php', {id:'0'}, function(response) {
            var arr = response.split(' ');
            decResp = arr[1]
            binResp = (parseInt(decResp, 10).toString(2));
            missingBin = 8 - binResp.length;
            tempBin = "";
            for ($i = 0; $i<missingBin;$i++){
                tempBin += "0";

            }
            tempBin += binResp;
            //alert(tempBin);
            //$("#response").html(response).show("fast").delay(1500).hide("slow");
            if(tempBin[8-rolMaster]>0){
                if(tempBin[8-rolGorDol]>0){
                   $("#dbr1d").addClass("active");
                   $("#dbr1d").attr('style', 'color: green;');
                } else {
                   $("#dbr1g").addClass("active");
                   $("#dbr1g").attr('style', 'color: green;');
                }
            }
            if(tempBin[8-svWc]>0){
                $("#kusv1").attr('style', 'color: green;');
            }
            if(tempBin[8-svDnevni]>0){
                $("#dbsv1").attr('style', 'color: green;');
            }
            if(tempBin[8-svKuhinja]>0){
                $("#dbsv2").attr('style', 'color: green;');
            }
            if(tempBin[8-svAmbijent]>0){
                $("#dbsv3").attr('style', 'color: green;');
            }
            if(tempBin[8-grijDnevni]>0){
                $("#dbsv4").attr('style', 'color: green;');
            }
            if(tempBin[8-grijWc]>0){
                $("#dbsv3").attr('style', 'color: green;');
            }

    });
    }

    ucitajSve();
    $('.Button').click(function(e) {
      var uklj;
      $('.Button').not(this).removeClass('pressed');
      $(this).toggleClass('pressed');
      e.preventDefault();
  });

    $("#slider1").on('touchend click', function(event) {
        $('#mojModal1Okvir').val($(this).data('id'));
        $('#mojModal1Okvir').modal('show');
    });

    $("#slider2").on('touchend click', function(event) {
        $('#mojModal1Okvir').val($(this).data('id'));
        $('#mojModal1Okvir').modal('show');
    });

    $("#sl1").on('touchend click', function(event) {
        event.stopPropagation();
        event.preventDefault();
        var _button = $(this);
        $.post("klijent.php", {
                id: "sl1",
                val: $("#slider1").val()
            },
            function(data, status) {
                //  alert("Data: " + data + "\nStatus: " + status);
                //  _button.text(data);
                //  alert("__"+data+"__");
                if (data == "OK") {
                    $("#slider1").animate({
                        opacity: 0.25 //,
                        //left: "+=50"//,
                        //height: "toggle"
                    }, 200, function() {
                        $("#slider1").css('opacity', '1');
                        // Animation complete.
                    });
                }
            });
    });

    $("#sl2").on('touchend click', function(event) {
        event.stopPropagation();
        event.preventDefault();
        // this fires once on all devices
        var _button = $(this);
        $.post("klijent.php", {
                id: "sl2",
                val: $("#slider2").val()
            },
            function(data, status) {
                //  alert("Data: " + data + "\nStatus: " + status);
                //  _button.text(data);
                //  alert("__"+data+"__");
                if (data == "OK") {
                    $("#slider2").animate({
                        opacity: 0.25 //,
                        //left: "+=50"//,
                        //height: "toggle"
                    }, 200, function() {
                        $("#slider2").css('opacity', '1');
                        // Animation complete.
                    });
                }
            });
    });
    function rgActive(setvalue){
      if(setvalue){
        rdActive(false);
        $("#dbr1g").addClass("active");
        $("#dbr1g").attr('style', 'color: green;');
      } else {
        $("#dbr1g").removeClass("active");
        $("#dbr1g").attr('style', 'color: white;');
      }
    }
    function rdActive(setvalue){
      if(setvalue){
        rgActive(false);
        $("#dbr1d").addClass("active");
        $("#dbr1d").attr('style', 'color: green;');
      } else {
        $("#dbr1d").removeClass("active");
        $("#dbr1d").attr('style', 'color: white;');
      }
    }

     function dbRolStop(){
      $.post('../writeStatus.php', {pin:rolMaster, status:"false"}, function(response) {
        //alert(response);
        //$("#response").html(response).show("fast").delay(1500).hide("slow");
      });
    }   

     function dbRolStart(){
      $.post('../writeStatus.php', {pin:rolMaster, status:"on"}, function(response) {
        //alert(response);
        //$("#response").html(response).show("fast").delay(1500).hide("slow");
      });
    } 

    function dbRolGore(){
      $.post('../writeStatus.php', {pin:'2', status:"false"}, function(response) {
        //alert(response);
        //$("#response").html(response).show("fast").delay(1500).hide("slow");
      });
    }
    function dbRolDolje(){
      $.post('../writeStatus.php', {pin:'2', status:"on"}, function(response) {
        //alert(response);
        //$("#response").html(response).show("fast").delay(1500).hide("slow");
      });
    }


    $("#dbr1g").click(function(e) {
      if ($(this).hasClass("active")) {
        rgActive(false);
        dbRolStop();
      } else {
        rgActive(true);
        dbRolStart();
        dbRolGore();
      }
        var _button = $(this);

    });
    $("#dbr1d").click(function(e) {
      if ($(this).hasClass("active")) {
        rdActive(false);
        dbRolStop();
      } else {
        rdActive(true);
        dbRolStart();
        dbRolDolje();
      }
        var _button = $(this);
        /*$.post("klijent.php", {
                id: "1"
            },
            function(data, status) {
                //alert("Data: " + data + "\nStatus: " + status);
                if (data == "OK1") {
                  //  _button.attr('style', 'color: green;');
                } else if (data = "OK0") {
                  //  _button.attr('style', 'color: white;');
                }
            });*/
    });


    $("#dbsv1").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:svDnevni, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });

    $("#dbsv2").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:svKuhinja, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });

    $("#dbsv3").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:svAmbijent, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });

    $("#dbsv4").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:grijDnevni, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });

    $("#kusv1").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:svWc, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });

/*
    $("#kusv2").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:'3', status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });
*/


    $("#kusv3").click(function(e) {
        $status = "false";
        var _button = $(this);
        if (_button.css('color')!="rgb(255, 255, 255)"){
        $status = "false";
      } else {
        $status = "on"
      }
        $.post('../writeStatus.php', {pin:grijWc, status:$status},
            function(response) {
                //alert("Data: " + data + "\nStatus: " + status);
                if ($.trim(response) == "#00 1") {
                    _button.attr('style', 'color: green;');
                } else if (data = "#00 0") {
                    _button.attr('style', 'color: white;');
                }
            });
    });



});
