@if(Session::has('error'))
	{{-- <div class="alert alert-danger alert-dismissible">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h5><i class="icon fa fa-ban"></i> Lỗi </h5>
     	{{Session::get('error')}}
    </div> --}}
	<p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

@if(Session::has('success'))
	{{-- <div class="alert alert-success alert-dismissible">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h5><i class="icon fa fa-check"></i> Thành công!</h5>
      	{{Session::get('success')}}
    </div> --}}
	<p class="alert alert-success">{{Session::get('success')}}</p>
@endif


@foreach($errors->all() as $error)
	{{-- <div class="alert alert-warning alert-dismissible">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      	<h5><i class="icon fa fa-warning"></i> Cảnh báo!</h5>
      	{{$error}}
    </div> --}}
	<p class="alert alert-danger">{{$error}}</p>
@endforeach