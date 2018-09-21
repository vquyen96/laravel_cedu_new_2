@foreach($courses as $item)
	<div class="col-md-4 col-sm-6 col-xs-12">
		<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
			<div class="courseMainItemImg" style="background: url('{{ file_exists(storage_path('app/course/resized360-'.$item->cou_img)) ? asset('lib/storage/app/course/resized360-'.$item->cou_img) : 'img/no_image.jpg' }}') no-repeat center /cover;">
				@if ($item->cou_sale != 0)
					<div class="courseMainItemSale">
						{{$item->cou_sale}}%
					</div>
					
				@endif
				<div class="courseMainItemPrice">
					{{number_format($item->cou_price,0,',','.')}}
					<span class="courseMainItemTime">
						<i class="fa fa-circle" aria-hidden="true"></i>
						{{time_format($item->updated_at)}}
					</span>
					
				</div>
				
			</div>
			<div class="courseMainItemName">
				{{cut_string($item->cou_name , 100)}}
			</div>
			<div class="courseMainItemTeacher">
				<div class="courseMainItemTeacherAva" style="background: url('{{ file_exists(storage_path('app/avatar/resized50-'.$item->tea->img)) ? asset('lib/storage/app/avatar/resized50-'.$item->tea->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;">
				</div>
				<div class="courseMainItemTeacherName">
					{{ $item->tea->name }}
				</div>
				<div class="courseMainItemStar">
					@for($i=0;$i<5;$i++)
						@if($item->cou_star > $i)
							<i class="fa fa-star starActive" aria-hidden="true"></i>
						@else
							<i class="fa fa-star" aria-hidden="true"></i>
						@endif
					@endfor
				</div>
			</div>

		</a>
	</div>
@endforeach
<div class="loadingCourse">
	<img src="img/Double Ring-1.4s-200px.gif">
</div>