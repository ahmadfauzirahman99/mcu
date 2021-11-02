$(function(){

    $("#status").hide();
    $("#pembedaancpns-pilhan_terima_jabatan").change(function(){

        var val = $("#pembedaancpns-pilhan_terima_jabatan").val();

        if(val == 'A' || val == 'B'){
            $("#status").show();
        }else{
            $("#status").hide();

        }
    })
})