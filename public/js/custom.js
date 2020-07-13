
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$(document).ready(function(e) {
    $('.selectpicker').selectpicker();
});

/*$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});*/

$(function(){
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    var durum = parseInt($("body").data("status"));

    switch (durum)
    {
        case 0 :
            toastr.error('Hata oluştu');
            break;
        case 1 :
            toastr.success('İşlem başarılı.');
            /*Command: toastr["success"]("I do not think that means what you think it means.", "İşlem başarılı.")*/
            break;
        case 2 :
            toastr.info('İşlem başarılı fakat yönetici onayladıktan sonra aktifleşecektir.');
            break;

        case 3 :
            toastr.warning('Zaten daha önce yazarlık talebinde bulunmuşsunuz.');
            break;



    }
    //
    $('[data-toggle="tooltip"]').tooltip();



  $('.summernote').summernote({
        height: 300,
        lang: 'tr-TR'
    });

   $('.selectpicker').selectpicker({
        style: 'btn-default'
    });

    $(".durum").bootstrapSwitch();


    $(".durum").on('switchChange.bootstrapSwitch', function(event, state) {
        console.log(this); // DOM element
        console.log(event); // jQuery event
        console.log(state); // true | false

        /*$.ajax({
            data: {"durum": state,"id":$(this).data("id") },
            type: "POST",
            url: $(this).data("url"),

            success: function(url) {
                //alert('Success');

            }
        });*/
    });
})
