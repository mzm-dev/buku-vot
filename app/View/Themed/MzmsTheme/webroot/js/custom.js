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

});