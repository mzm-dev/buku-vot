//Tooltip
$('a').tooltip('hide');


$(".datepicker").datetimepicker({
    pickTime: false
});
$(document).ready(function(){
    $("#ParticularParentId").select2();
    $("#ParticularTypeId").select2();
    
//    $("#ParticularCategoryId").change(function()
//    {
//        switch ($(this).val())
//        {
//            case '1':
//                $("#inputBlank").show(); 
//                $("#inputDebit").hide();            
//                $("#inputTd").show();        
//                $("#inputDebitTbs").hide();  
//                $("#inputBtn").show(); 
//                
//                break;					
//            case '2':
//                $("#inputBlank").show();
//                $("#inputDebit").show();               
//                $("#inputTd").hide();        
//                $("#inputDebitTbs").hide();  
//                $("#inputBtn").show();
//                
//                break;
//            case '3':
//                $("#inputBlank").show(); 
//                $("#inputDebit").show();
//                $("#inputTd").hide();
//                $("#inputDebitTbs").show(); 
//                $("#inputBtn").show();                 
//                $("#ParticularParentId").change(function(){
//                    jQuery.ajax({
//                        url: 	site_url + '/particulars/ajax_tbs/' + $(this).val(),
//                        type: 'post',
//                        dataType: 'json',
//                        success: function(r) {
//                            switch (r.status)
//                            {
//                                case 'success':
//                                    jQuery('#ParticularText').val(r.text);
//                                    jQuery('#ParticularDebit').val(r.particular);
//                                    
//                                    break;
//
//                                case 'error':
//                                    break;
//                            }
//                        }
//                    });
//                });
//                
//                break;
//            default:
//                $("#inputBlank").hide();
//                $("#inputDebit").hide();  
//                $("#inputDebitTbs").hide();  
//                $("#inputTd").hide();       
//                $("#inputBtn").hide();                 
//                break;
//        }        
//    });
//    $("#inputBlank").hide();
//    $("#inputDebit").hide();
//    $("#inputTd").hide();    
//    $("#inputDebitTbs").hide();
//    $("#inputBtn").hide(); 
//   
});