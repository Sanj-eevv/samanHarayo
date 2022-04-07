{{--@can('view',\App\Models\User::class)--}}
<a href="{{route('roles.show', $r->id)}}" class="btn btn-secondary position-relative p-0 avatar-xs rounded waves-effect waves-light">
    <span class="avatar-title bg-transparent">
        <i class="mdi mdi-eye-outline"></i>
    </span>
</a>
{{--@endcan--}}

{{--@can('update',\App\Models\User::class)--}}
<a href="{{route('roles.edit', $r->id)}}" class="btn btn-info position-relative p-0 avatar-xs rounded waves-effect waves-light">
    <span class="avatar-title bg-transparent">
        <i class="mdi mdi-pencil"></i>
    </span>
</a>
{{--@endcan--}}

{{--@can('destroy',\App\Models\User::class)--}}
@if($r->preserved != 'yes')
<button onclick="confirmDelete(() => {deleteRole({{$r->id}})})" class="btn btn-danger position-relative p-0 avatar-xs rounded waves-effect waves-light">
    <span class="avatar-title bg-transparent">
        <i class="mdi mdi-trash-can-outline"></i>
    </span>
</button>
@endif
{{--@endcan--}}