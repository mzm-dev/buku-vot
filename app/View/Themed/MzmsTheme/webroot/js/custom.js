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
            $("table#userStyle").css("fontSize", "80%");
            $("li#admin").remove();
            break;
    }

    if (sid > 1) {
        $("li#admin").remove();
    } else {
        $("li#admin").removeAttr('id');
    }


});