@extends('backend.master')
@section('title','Home')
@section('main')

<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="container-fluid">
	<form method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Gửi mail marketing</h3>
			</div>
			<div>
				
				<div class="form-group">
					<textarea class="form-control ckeditor" rows="5" name="content"></textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('content',{
							language:'vi',
							filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</div>
			  	<div class="form-group">
			    	<input type="submit" class="btn btn-success" value="Gửi đi" onclick="return confirm('Bạn có chắc chắn muốn gửi ?')">
			  	</div>
			  	
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div>
				<h3>Danh sách lĩnh vực</h3>
			</div>
			<table class="table table-hover">
				<tr>
					
					<th>
						<input type="checkbox" name="check_all">
					</th>
					<th>Email</th>

				</tr>
				@foreach($items as $item)
				<tr>	
					<td class="tableAcountImg">
						<input type="checkbox" name="check_item[]" class="check_item" value="{{$item->gift_email}}">
					</td>
					<td>{{$item->gift_email}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	{{csrf_field()}}
	</form>
		
</div>

@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', "input[name='check_all']", function() {
			if ($('input[name="check_all"]').is(':checked')) {
				$('input[name="check_item[]"]').attr('checked', 'true');
				$('input[name="check_item"]').attr('checked', 'true');
			}
			else{
				$('input[name="check_item[]"]').attr('checked', 'false');
			}
		});
		// $('input[name="check_all"]').click(function(){
			
		// });
		
	});
	
</script>
@stop