// $(function(){
//
//     $('#api_form').on('submit',function(e){
//         $.ajaxSetup({
//             header:$('meta[name="_token"]').attr('content')
//         })
//         e.preventDefault(e);
//
//         var sifra = $('#sifra').val();
//         var barkod = $('#barkod').val();
//
//         $.ajax({
//
//             type:"POST",
//             url:'/getData',
//             data:{ sifra: sifra, barkod: barkod },
//             success: function(data){
//                 console.log(data);
//             },
//             error: function(data){
//
//             }
//         })
//     });
// });

$(function(){

    $('#api_form').on('submit',function(e){
        $('.loader').show();
    });
});