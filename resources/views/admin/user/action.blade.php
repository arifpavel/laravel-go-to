@can('edit-user')
<a href="{{ url('admin/users/'.$user->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;
<a href="{{ url('admin/users/block/'.$user->id) }}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Block</a> &nbsp;
@endcan
@can('delete-user')
    <form method="post" action="{{ url('admin/users/'.$user->id) }}"> 
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                            </form>
@endcan
            