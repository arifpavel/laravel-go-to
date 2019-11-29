@can('manage-roles')
<div style="inline-block">
<a href="{{ url('admin/roles/'.$role->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp;
                            <form method="post" action="{{ url('admin/roles/'.$role->id) }}"> 
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                            </form>
</div>
@endcan
            