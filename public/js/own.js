$( document ).ready(function() {

    // put values year in select box year

    //$('.year');
    var options = '';
    var currentYear = (new Date()).getFullYear();
    for(var i = currentYear; i >= 1990; i--){
        options += "<option value='"+ i +"' >"+ i +"</option>";
    }
    $('.year option').after(options);

    // display none message

    $('.alert-btn').click(function(){
        $('.alert').css({'display': 'none'});
    });

    if($('.alert')){
        $('.alert').css({'right':0, 'transition': 'all  .7s', '-webkit-transition': 'all .7s'});
        setTimeout(function(){
            $('#msgAlert').fadeOut('slow');
        }, 10000);
    }


    $(document).on('change', '#games', function(){

          $.ajax({
            type: "GET",
            url: "battles_create",
            data: {
                gameid: $(this).val()
            },
            success: function(data){
                data = JSON.parse(data);
                var numberPlayers = data[0][0].nop;
                console.log(data[1]);
                var select = '';
                $('#players .form-group').remove();
                if(data.length){
                    for(var i=1; i <= numberPlayers; i++){
                        select += "<div class='form-group w-50 float-left'>" +
                                    "<label>player "+ i +" * </label>" +
                                    "<select class='form-control battle-select' name='players[]'>";
                                        $.each(data[1], function(key, value){
                                            select += "<option value='"+ data[1][key].id +"'>"+ data[1][key].nickname +"</option>";
                                        });
                        select +=   "</select></div>"
                    }
                    $('#players').prepend(select);

                }
            }, error: function (xhr, textStatus, errorThrown) {
                console.log('failed');
            }
        });

    });


});