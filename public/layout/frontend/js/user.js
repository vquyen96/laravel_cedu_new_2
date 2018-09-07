
function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatarImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#avatar').click(function(){
        $('#img').click();
    });
    var countBtnChangeChart = 0;
    $('.btnChangeChart').click(function(){
        if (countBtnChangeChart == 0) {
            $('#chartSpLine_year').css({'right':'50%'});
            $('#chartSpLine_month').css({'right':'150%'});
            $(this).text('>>> 1 tháng');
            countBtnChangeChart = 1;
        }
        else{
            $('#chartSpLine_year').css({'right':'-50%'});
            $('#chartSpLine_month').css({'right':'50%'});
            $(this).text('1 năm >>>');
            countBtnChangeChart = 0;
        }
        
    });
    $('.btnChangePass').click(function(){
        $(this).hide();
        $('input[name=password]').show();
    });
    $('.btnHideChart,.showChart').click(function(){
        $('.userChart').slideToggle();
        $('.showChart').slideToggle();
    });
    $('.btnHideTable,.showTable').click(function(){
        $('.userTableChart').slideToggle();
        $('.showTable').slideToggle();
    });
    $('.btnHideTableLink,.showTableLink').click(function(){
        $('.userTableLink').slideToggle();
        $('.showTableLink').slideToggle();
    });
    $('.btnHideDetail,.showDetail').click(function(){
        $('.userDetail').slideToggle();
        $('.showDetail').slideToggle();
    });
    
    
});
