$(document).ready(function(){
    $(document).on('change', '#select_course', function (e) {
        $('.loadingCourse').show();
        var id = $(this).val();
        var url = $('.currentUrl').text();
        console.log(id);
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: url+'get_course_home',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                console.log(resp);
                if(resp != 'error'){
                    setTimeout(function () {
                        $('.courseMain').html(resp);
                        $('.loadingCourse').hide();
                    },200);
                }

            },
            error: function () {
                console.log('error');
            }
        });
    });

    var num = 1;
    setTimeout(function (){render_view()},1000);
    // render_view();
    function render_view() {
        var url = $('.currentUrl').text();
        $.ajax({
            method: 'POST',
            url: url+'get_templace',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'num': num
            },
            success: function (resp) {
                if(resp != 'error'){
                    switch (num) {
                        case 1:
                            $('.home1').html(resp);
                            break;
                        case 2:
                            $('.home2').html(resp);
                            break;
                        case 3:
                            $('.home3').html(resp);
                            break;
                        case 4:
                            $('.home4').html(resp);
                            break;
                    }
                    num++;
                }
                if (num<5){
                    render_view()
                }

                // setTimeout(function(){},3000);
            },
            error: function () {
                console.log('error');
            }
        });
    }
});