$(function(){

    $('#api_form').on('submit',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e);

        $.ajax({

            type:"POST",
            url:'/',
            data:$(this).serialize(),
            dataType: 'json',
            success: function(data){
                console.log(data);
            },
            error: function(data){

            }
        })
    });
});