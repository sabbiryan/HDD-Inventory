
$("#wd").hide();
$("#seagate").hide();
$("#samsung").hide();
$("#hitachi_ibm").hide();
$("#fujitsu").hide();
$("#toshiba").hide();


function loadHDDRequireFields(modelName) {
    //alert(modelName.value);
    //console.log(modelName);
    //var xmlHttp = new XMLHttpRequest();
    //xmlHttp.onreadystatechange = function() {
    //    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
    //        console.log(xmlHttp.responseText);
    //        document.getElementById("date").innerHTML = xmlHttp.responseText;
    //    }
    //}
    //xmlHttp.open("GET", "/Student/Test?p="+ division.value, true);
    //xmlHttp.send();

    if(modelName.value == "Toshiba"){
        $("#toshiba").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='sn'>SN *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='sn' name='sn' placeholder='SN' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='hddCode'>HDD Code *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='hddCode' name='hddCode' placeholder='HDD Code' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='fw'>FW *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='fw' name='fw' placeholder='FW' required='required' />" +
        "</div>" +
        "</div>";


        $("#toshiba").append(output) ;
        $("#pcbGroup").show();
        $( "#pcb" ).validate({
            rules: {
                pcb: {
                    required: true
                }
            }
        });

        $("#wd").hide();
        $("#seagate").hide();
        $("#samsung").hide();
        $("#hitachi_ibm").hide();
        $("#fujitsu").hide();
        $("#toshiba").show();
    }

    if(modelName.value == "Fujitsu"){
        $("#fujitsu").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='pn'>PN *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='pn' name='pn' placeholder='PN' required='required' />" +
            "</div>" +
            "</div>";

        $("#fujitsu").append(output) ;
        $("#pcbGroup").show();

        $("#wd").hide();
        //$("#wd").empty();

        $("#seagate").hide();
        //$("#seagate").empty();

        $("#samsung").hide();
        //$("#samsung").clear();

        $("#hitachi_ibm").hide();
        //$("#hitachi_ibm").clear();

        $("#fujitsu").show();

        $("#toshiba").hide();
        //$("#toshiba").clear();
    }

    if(modelName.value == "Hitachi/IBM"){
        $("#hitachi_ibm").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='pn'>PN</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='pn' name='pn' placeholder='PN' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='mlc'>MLC *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='mlc' name='mlc' placeholder='MLC' required='required' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='PCBSticker'>PCB Sticker</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='PCBSticker' name='PCBSticker' placeholder='PCB Sticker' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='mcu'>MCU *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='mcu' name='mcu' placeholder='MCU' required='required' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='smooth'>SMOOTH *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='smooth' name='smooth' placeholder='SMOOTH' required='required' />" +
        "</div>" +
        "</div>";

        $("#hitachi_ibm").append(output) ;
        $("#pcbGroup").hide();

        $("#wd").hide();
        $("#seagate").hide();
        $("#samsung").hide();
        $("#hitachi_ibm").show();
        $("#fujitsu").hide();
        $("#toshiba").hide();
    }

    if(modelName.value == "Samsung"){
        $("#samsung").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='pn'>PN *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='pn' name='pn' placeholder='PN' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='fw'>FW</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='fw' name='fw' placeholder='FW' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='rev'>Rev</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='rev' name='rev' placeholder='Rev' />" +
        "</div>" +
        "</div>";

        $("#samsung").append(output) ;
        $("#pcbGroup").show();

        $("#wd").hide();
        $("#seagate").hide();
        $("#samsung").show();
        $("#hitachi_ibm").hide();
        $("#fujitsu").hide();
        $("#toshiba").hide();
    }

    if(modelName.value == "Seagate"){
        $("#seagate").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='pn'>P/N *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='pn' name='pn' placeholder='P/N' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='fw'>FW *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='fw' name='fw' placeholder='FW' required='required' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='siteCode'>Site Code *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='siteCode' name='siteCode' placeholder='Site Code' required='required' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='PCBSticker'>PCB Sticker *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='PCBSticker' name='PCBSticker' placeholder='PCB Sticker' required='required' />" +
        "</div>" +
        "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='sn'>S/N *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='sn' name='sn' placeholder='S/N' required='required' />" +
        "</div>" +
        "</div>";

        $("#seagate").append(output) ;
        $("#pcbGroup").show();

        $("#wd").hide();
        $("#seagate").show();
        $("#samsung").hide();
        $("#hitachi_ibm").hide();
        $("#fujitsu").hide();
        $("#toshiba").hide();
    }

    if(modelName.value == "Western Digital"){
        var output = "";
        $("#wd").empty();
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='sn'>SN *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='sn' name='sn' placeholder='SN' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
        "<div>" +
        "<label class='control-label col-lg-12' for='dcm'>DCM *</label>" +
        "<div class='col-lg-4'>" +
        "<input class='form-control' type='text' id='dcm' name='dcm' placeholder='DCM' required='required' />" +
        "</div>" +
        "</div>";

        $("#wd").append(output) ;
        $("#pcbGroup").show();

        $("#wd").show();
        $("#seagate").hide();
        $("#samsung").hide();
        $("#hitachi_ibm").hide();
        $("#fujitsu").hide();
        $("#toshiba").hide();
    }

}
