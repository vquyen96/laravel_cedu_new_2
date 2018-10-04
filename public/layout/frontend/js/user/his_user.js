$(document).ready(function(){
    $(document).on('click', '.btn_detail', function () {
        var id_order = $(this).attr('value');
        var url = $('.currentUrl').text();

        $.ajax({
            method: 'POST',
            url: url+'user/list_orderdetail',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id_order': id_order,
            },
            success: function (resp) {
                $('#modal_detail .modal-content').html(resp);
                $('#modal_detail').modal();
            },
            error: function () {
                console.log('error');
            }
        });

    })
    $(document).on('click', '.btn_submit', function () {
        $('#form_transfer').submit();
    })
});