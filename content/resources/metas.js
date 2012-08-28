$(document).ready(function(){
    $(".btn").live("click",function(){
        
        $(this).parents("form").find("input[name=action]").val($(this).val());
        $(this).parents("form").ajaxSubmit({
        
            success :function(data) { 
                $("#main-admin").html(data);
            }
        });
    });
    $("#meta_name_dropdown").live("change",function(){
        if($(this).val() == "new"){
            $("#meta_name_insert").show();
            $("#meta_name_insert").removeAttr('disabled');
        }
        else{
             $("#meta_name_insert").hide(); 
             $("#meta_name_insert").attr('disabled','disabled');
        }
    });
    /*
    $('form[name=createOrder]').ajaxSubmit({
        success :function(data) { 
            if(data.flat == true){
                alert('không upload được hình ảnh');
            }
            else{
                $("#container-ajax").html(data.content); 
                $('#formInsert').hide();
            }
        }
    }); */
    
});


