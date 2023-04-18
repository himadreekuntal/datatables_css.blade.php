<!-- Category Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('permission', 'Permission:') !!}
    @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
         <label class="label label-success">{{ $v->name }},</label>
        @endforeach
    @endif
</div>

