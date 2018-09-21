<div class="aff_ava" style="background: url('{{ file_exists(asset('lib/storage/app/avatar/resized50-'.$acc->img)) ? asset('lib/storage/app/avatar/resized50-'.$acc->img) : 'img/no-avatar.jpg' }}') no-repeat center /cover;"></div>
<div class="aff_name">{{ $acc->name }}</div>
<div class="aff_check">
	<i class="fas fa-check"></i>
</div>