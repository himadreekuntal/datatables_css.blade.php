<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>



<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Two Factor Secret Field -->
<div class="form-group">
    {!! Form::label('roles', 'Role:') !!}
    @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
        @endforeach
    @endif
</div>

<!-- Two Factor Recovery Codes Field -->


