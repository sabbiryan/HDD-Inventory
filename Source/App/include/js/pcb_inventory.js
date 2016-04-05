
$("#hitachi_ibm_pcb").hide();

function loadRequireFields(modelName) {

    if(modelName.value == "Hitachi/IBM"){
        $("#hitachi_ibm").empty();
        var output = "";
        var output = "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='pn'>MCU *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='mcu' name='mcu' placeholder='MCU' required='required' />" +
            "</div>" +
            "</div>";
        output += "<div class='col-lg-12 '><br/></div>" +
            "<div>" +
            "<label class='control-label col-lg-12' for='smooth'>Smooth *</label>" +
            "<div class='col-lg-4'>" +
            "<input class='form-control' type='text' id='smooth' name='smooth' placeholder='Smooth' required='required' />" +
            "</div>" +
            "</div>";

        $("#hitachi_ibm_pcb").append(output) ;

        $("#pcbController").hide();
        $("#pcbBr").hide();

        $("#hitachi_ibm_pcb").show();
    }
    else{
        $("#hitachi_ibm_pcb").empty();
        $("#pcbController").show();
        $("#pcbBr").show();
    }

}
