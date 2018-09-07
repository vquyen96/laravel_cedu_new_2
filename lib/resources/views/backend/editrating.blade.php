@extends('backend.master')
@section('title','Home')
@section('main')


<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div>
	<div>
		<h2 class="">Sửa đánh giá</h2>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div>
					<h3>{{$rat->cou->cou_name}}</h3>
				</div>
				<div class="editComImg">
					<img class="thumbnail" src="{{asset('lib/storage/app/course/'.$rat->cou->cou_img)}}">
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div>
					<h3>{{$rat->acc->name}}</h3>
				</div>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
					    <label>Đánh giá</label>
					    <div class="editComStar">
					    	@for($i=0;$i<5;$i++)
								@if($rat->rat_star > $i)
									<i class="fa fa-star starActive" id="star{{$i}}" aria-hidden="true"></i>
								@else
									<i class="fa fa-star" id="star{{$i}}" aria-hidden="true"></i>

								@endif
							@endfor
					    </div>
					    
					
					</div>
					<div class="form-group">
					    
					    <input type="hidden" class="form-control" id="star" name="star" required>
					</div>
					<div class="form-group">
					    <label>Tiêu đề đánh giá</label>
					    <input type="text" class="form-control" value="{{$rat->rat_title}}" name="title" required>
					</div>
					<div class="form-group">
					    <label>Nội dung đánh giá</label>
					    <textarea class="form-control" name="content" rows="5">{{$rat->rat_content}}</textarea>
					</div>
					<div class="form-group">
				    	
				    	<input type="submit" class="btn btn-success" value="Thay đổi">
				    	<a href="{{asset('admin/rating/detail/'.$rat->cou->cou_id)}}" class="btn btn-warning"> Quay lại</a>
				  	</div>
		  			{{csrf_field()}}
				</form>
			</div>
		</div>
		
	</div>
</div>


@stop