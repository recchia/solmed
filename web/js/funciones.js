$(document).ready(function(){
    var tips = $( ".validateTips" );
    
    function cambiarPassword(form) {
        form = $(form);
        $.ajax({
            url: form.attr('action'),
            data: form.serialize(),
            type: (form.attr('method')),
            dataType: 'json',
            success: function(data){
                switch (data.status) {
                    case 'true':
                        style = "ui-state-highlight";
                        break;
                    case 'false':
                        style = "ui-state-error ";
                        break;
                    default:
                        break;
                }

                updateTips(data.mensaje, style);
            }
        });
    }

    function updateTips( t, style ) {
        tips
        .removeClass();
        tips
        .text( t )
        .addClass( style );
    }
    
    $(function() {
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 240,
            width: 350,
            modal: true,
            buttons: {
                "Cambiar": function() {
                    cambiarPassword($(this).find('form'));
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

});

function logout(Url) {
    $("#dialog-confirm").data('url',Url);
    $('#dialog-confirm').dialog('open');
}