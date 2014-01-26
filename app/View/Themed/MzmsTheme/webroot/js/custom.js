//Tooltip
$('a').tooltip('hide');


$(".datepicker").datetimepicker({
    pickTime: false
});

$(document).ready(function() {
    $("#ParticularParentId").select2();
    $("#ParticularTypeId").select2();
    $("#UserGroupId").select2();
    $("#ParticularActivityId").select2();


//setting view colm table admin/user
    switch (sid)
    {
        case '1':
        case '2':
            $("th#admin").removeAttr('id');
            $("td#admin").removeAttr('id');
            $("table#userStyle").css("fontSize", "60%");

            break;
        default:
            $("th#admin").remove();
            $("td#admin").remove();
            //$("div#admin").remove();
            $("table#userStyle").css("fontSize", "80%");
            $("li#admin").remove();
            break;
    }

// show/hide admin menu.
    if (sid > 1) {
        $("li#admin").remove();
    } else {
        $("li#admin").removeAttr('id');
    }

    $('#reports').click(function(event) {
        event.preventDefault();
        var w = window.open("", "popupWindow", "width=700,height=500,toolbar=0,menubar=0,location=1,status=1,scrollbars=1,resizable=1,left=0,top=0");
    });

    /*ADD ROOM AJAX*/
    jQuery('#link-add-type').live('click', function() {

        // remove previous form if exists
        if (jQuery('#dialog-add-type').length > 0)
        {
            jQuery('#dialog-add-type').remove();
        }

        // get the type detail
        jQuery.ajax({
            url: site_url + '/types/ajax_add_type',
            success: function(r) {
                jQuery('body').append(r);
                jQuery('#dialog-add-type').modal('show');
            }
        });

        return false;
    });


    jQuery('#dialog-add-type .btn-primary').live('click', function() {

        // make sure the title is not empty
        if (jQuery('#TypeName').val() == '')
        {
            alert('Please enter type name');
            jQuery('#TypeName').focus();
            return false;
        }

        // assign to var to avoid asynchonous active removing the values
        var type_name = jQuery('#TypeName').val();

        // create ajax operation
        jQuery.ajax({
            url: jQuery('#dialog-add-type form').attr('action'),
            type: 'post',
            dataType: 'json',
            data: {
                'data[Type][name]': type_name,
            },
            success: function(r) {

                switch (r.status)
                {
                    case 'berjaya':
                        var type_name = jQuery('#TypeName').val();
                        var type_id = r.id;
                        var o = new Option(type_name, type_id);
                        //$("#ParticularTypeId").select2('data', {id: r.id, text: type_name});                      
                        //$("#ParticularTypeId").select2(type_id, type_name);                                                  
                        $(o).html(type_name);
                        $("#ParticularTypeId").append(o);
                        $("#ParticularTypeId option[value='" + type_id + "']").attr('selected', 'selected');



                        break;

                    case 'error':
                        break;
                }

                // show the flash message
                if (jQuery('#flashMessage').length > 0)
                {
                    // remove the old one, if any
                    jQuery('#flashMessage').remove();
                }

                if (r.status === 'berjaya') {
                    var flash = '<div id="flashMessage" class="alert alert-block alert-success fade in"><button type="button" class="close" data-dismiss="alert">×</button><p>' + r.message + '</p></div>';
                    jQuery('#content').prepend(flash);
                } else {
                    var flash = '<div id="flashMessage" class="alert alert-block alert-error fade in"><button type="button" class="close" data-dismiss="alert">×</button><p>' + r.message + '</p></div>';
                    jQuery('#content').prepend(flash);
                }
                jQuery('#flashMessage').fadeIn();
            }
        });



        // hide the dialog box
        jQuery('#dialog-add-type').modal('hide');

        // prevent default action
        return false;

    });

    // remove the form
    jQuery('#dialog-add-type').on('hidden', function() {
        jQuery('#dialog-add-type').remove();
    });
    /*END ADD ROOM AJAX*/



});