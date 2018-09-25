<div class="aff_ava" style="background: url('{{asset('lib/storage/app/avatar/resized50-'.$acc->img)}}') no-repeat center /cover;"></div>
<div class="aff_name">{{ $acc->name }}</div>
<div class="aff_check">
	<i class="fas fa-check"></i>
</div>
{{ file_exists(storage_path('app/avatar/resized50-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized50-'.Auth::user()->img) : Auth::user()->provider_id != null ? Auth::user()->img : 'img/no-avatar.jpg' }}
{{ file_exists(storage_path('app/avatar/resized50-'.Auth::user()->img)) ? asset('lib/storage/app/avatar/resized50-'.Auth::user()->img) : Auth::user()->provider != null ? Auth::user()->img : 'img/no-avatar.jpg' }}