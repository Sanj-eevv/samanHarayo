@can('view',\App\Models\Contact::class)
<a href="{{route('contacts.show', $r->id)}}" class="btn btn-secondary position-relative p-0 avatar-xs rounded waves-effect waves-light">
    <span class="avatar-title bg-transparent">
        <i class="mdi mdi-eye-outline"></i>
    </span>
</a>
@endcan
@can('destroy',\App\Models\Contact::class)
<button onclick="confirmDelete(() => {deleteContact({{$r->id}})})" class="btn btn-danger position-relative p-0 avatar-xs rounded waves-effect waves-light">
    <span class="avatar-title bg-transparent">
        <i class="mdi mdi-trash-can-outline"></i>
    </span>
</button>
@endcan
