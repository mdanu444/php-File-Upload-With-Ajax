$(document).ready(function(){
    $('.errorCloser').click(function(){
        $(".error").hide();
        $(".success").hide();
        this.hide();
    });
    $(".error").fadeOut(6000);
    $(".success").fadeOut(6000);



    $("#search").keyup(function(){
        let val = $("#search").val(); 
            if(val == ""){
                $("#resultContainer").html("");
            }else{
                $.ajax({
                    url: "ajaxReturns/search.php",
                    method: "POST", 
                    data: {search:val},
                    success:function(data){
                        $("#resultContainer").html(data);
                        $("#resultContainer").css({
                            'overflow': "scroll",
                            'max-height': '500px'
                    });
                    }
                });
            }
    });
});


