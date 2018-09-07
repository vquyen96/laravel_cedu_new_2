@foreach($courses as $item)
	<div class="col-md-4 col-sm-6 col-xs-12">
		<a href="{{ asset('courses/detail/'.$item->cou_slug.'.html') }}" class="courseMainItem">
			<div class="courseMainItemImg" style="background: url('{{ asset('lib/storage/app/course/'.$item->cou_img) }}') no-repeat center /cover;">
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
				<div class="courseMainItemTeacherAva" style="background: url('{{ asset('lib/storage/app/avatar/resized-'.$item->tea->img) }}') no-repeat center /cover;">
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