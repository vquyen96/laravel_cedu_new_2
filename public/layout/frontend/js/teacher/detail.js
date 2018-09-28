$(document).ready(function() {
  var url = $('.currentUrl').text();
  // $('.profileLeftButton').click(function(){
  //   $('#img').click();
  // });
  // @if (Request::segment(2) == 'add')
  // $('.inputEdit').click();  
  // @endif
  $('.toggle').click(function(){

    if($(this).hasClass('fa-plus')){
      $(this).removeClass('fa-plus');
      $(this).addClass('fa-minus');
    }
    else{
      $(this).removeClass('fa-minus');
      $(this).addClass('fa-plus');
    }
    $(this).siblings('ul').slideToggle(400);
  })

  
  
  
  $('.add-video').click(function(){
    var action = $(this).find('.action_form').text();
    $('.form_add_video').attr('action', action);
    $('#modal_add_video').modal();
  });

  $('.edit-title').click(function(){
    var title = $(this).find('.value_form_tile').text();
    var action = $(this).find('.action_form_tile').text();

    $('.form_update_action').attr('action',action);
    $('.form_update_tile').attr('value',title);

    $('#myModaledit').modal();

  });

  // $('.addDocument').click(function(){
  //   var action = $(this).find('.action_form').text();
  //   $('.form_add_doc').attr('action', action);
  //   $('#modal_add_doc').modal();
  // });

  $('.addDocument').click(function(){
    var action = $(this).find('.action_form').text();
    $('.form_add_doc').attr('action', action);
    $('#modal_add_doc').modal();
    $('#viewer_doc').hide();
  });

  $('.edit_document').click(function(){
    var action = $(this).find('.action_form').text();
    var doc_name = $(this).prev().text();
    var doc_link = $(this).find('.doc_form').text();

    doc_name = doc_name.trim();
    console.log(doc_name);
    $('input[name="doc_name"]').val(doc_name);
    $('.form_add_doc').attr('action', action);
    $('#modal_add_doc').modal();

    $('#viewer_doc').attr('src', url+'/lib/storage/app/doc/' + doc_link );
    $('#viewer_doc').show();
  });


  
  

  $(document).on('change', '#group', function (e) {
    var group_id = $(this).val();
    $.ajax({
      method: 'POST',
      url: url+'teacher/group_child_from',
      data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'groupid': group_id
      },
      success: function (resp) {
       if(resp){
            console.log(resp);
            setTimeout(function () {
                $('#group_child').html(resp);
            },200);
        }

      },
      error: function () {
        console.log('error');
      }
    });
  });

  // Dừng video khi modal tắt
  $('#modal_edit_video').on('hidden.bs.modal', function () {
    var vid = document.getElementById("video_edit");
    vid.pause();  
  })
  $('#modal_edit_video').on('show.bs.modal', function () {
    var vid = document.getElementById("video_edit");
    vid.play();  
  })
  $('#modal_add_video').on('hidden.bs.modal', function () {
    var vid = document.getElementById("video");
    vid.pause();  
  })
  $('#modal_add_video').on('show.bs.modal', function () {
    var vid = document.getElementById("video");
    vid.play();  
  })


});

var myVideoPlayer_edit = document.getElementById('fileItem_edit');
  
var URL_edit = window.URL || window.webkitURL;
var video_edit = document.getElementById('video_edit');
var vid_edit = document.getElementsByTagName('textarea_edit');
function onChangeEdit() {
  var fileItem_edit = document.getElementById('fileItem_edit');
  console.log(fileItem_edit);
  var files_edit = fileItem_edit.files;
  var file_edit = files_edit[0];
  console.log(file_edit);
  $('#video_edit').show();
  var url_edit = URL.createObjectURL(file_edit);
  console.log(url_edit);
  video_edit.src = url_edit;
  video_edit.load();
  video_edit.onloadeddata = function() {
    console.log(this);
    URL.revokeObjectURL(this.src); 
      video_edit.play();
      $('#duration_edit').val(video_edit.duration);
      console.log(video_edit.duration);
  }
}

var myVideoPlayer = document.getElementById('fileItem');
var URL = window.URL || window.webkitURL;
var video = document.getElementsByTagName('video')[0];
var vid = document.getElementsByTagName('textarea');
$('#video').attr('style','display: none');
function onChange() {
  var fileItem = document.getElementById('fileItem');
  var files = fileItem.files;
  var file = files[0];
  $('#video').show();
  var url = URL.createObjectURL(file);
  video.src = url;
  video.load();
  video.onloadeddata = function() {
    URL.revokeObjectURL(this.src); 
      video.play();
      $('#duration').val(video.duration);
      console.log(video.duration);
  }
}


function Prevew_doc() {
    pdffile=document.getElementById("upload_add").files[0];
    var extension = pdffile.name.split('.').pop();
    if (extension == 'pdf') {
       pdffile_url=URL.createObjectURL(pdffile);
      $('#viewer_add').attr('src',pdffile_url);
      $('#viewer_add').show();
    }
     
}
function Prevew_doc_edit() {
    pdffile=document.getElementById("upload_edit").files[0];
    var extension = pdffile.name.split('.').pop();
    if (extension == 'pdf') {
      pdffile_url=URL.createObjectURL(pdffile);
      $('#viewer_edit').attr('src',pdffile_url);
      $('#viewer_edit').show();
    }
}

function Prevew_document() {
    pdffile=document.getElementById("upload_doc").files[0];
    var extension = pdffile.name.split('.').pop();
    if (extension == 'pdf') {
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer_doc').attr('src',pdffile_url);
        $('#viewer_doc').show();
    }
}

