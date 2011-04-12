function logout(Url) {
    $("#dialog-confirm").data('url',Url);
    $('#dialog-confirm').dialog('open');
}

$(function() {
    $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 200,
        width: 350,
        modal: true,
        buttons: {
            "Cambiar": function() {
                alert('En desarrollo');
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        }
    });
});

$(function() {
    $( "#dialog-confirm" ).dialog({
        autoOpen: false,
        resizable: false,
        height:140,
        width: 200,
        modal: true,
        buttons: {
            "Salir": function() {
                $(location).attr('href',$( this ).data('url'));
            },
            "Cancelar": function() {
                $( this ).dialog( "close" );
            }
        }
    });
});
