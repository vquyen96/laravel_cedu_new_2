<option value="" disabled selected>Chọn danh mục con</option>
@foreach($list_group_child as $group)
    <option value="{{ $group->gr_id }}">{{ $group->gr_name }}</option>
@endforeach