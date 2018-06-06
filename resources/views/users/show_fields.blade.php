<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    @php
    if(empty($user->image))
      {
        $image = "http://digilander.libero.it/Ictszu/rev4.0/avatar.jpg";
      }
    else
      {
        $image = $user->image;
      }
    @endphp
    <p><img src="{!! $image !!}" class="user-image col-lg-3 col-md-4 col-sm-6 col-xs-12" alt="User Image"/></p>
    <div class="row"></div>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $user->password !!}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{!! $user->remember_token !!}</p>
</div>

<!-- Rol Field -->
<div class="form-group">
    {!! Form::label('rol', 'Rol:') !!}
    <p>{!! $user->rol !!}</p>
</div>


<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $user->estado !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>
