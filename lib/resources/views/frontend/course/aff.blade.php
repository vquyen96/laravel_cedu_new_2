<div class="aff_ava" style="background: url('{{ file_exists(storage_path('app/avatar/resized50-'.$acc->img)) ? asset('lib/storage/app/avatar/resized50-'.$acc->img) : ($acc->provider_id != null ? $acc->img : 'img/no-avatar.jpg') }}') no-repeat center /cover;"></div>
<div class="aff_name">{{ $acc->name }}</div>
<div class="aff_check">
	<i class="fas fa-check"></i>
</div>
