@extends('layouts.main')
@section('content')
<article class="login register">
      @if($errors->has())
    <div class='alert alert-danger'>
        {{ Lang::get('redminportal::messages.error') }}
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ Form::open(array('action' => 'UserController@postStore', 'role' => 'form')) }}
    <h1>Edit customer Details</h1>
    {{ Form::hidden('id', $user->id) }}
    <p>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', $user->first_name, array('class' => 'form-control', 'required')) }}
    </p>
    <p>
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', $user->last_name, array('class' => 'form-control', 'required')) }}

    </p>
    <p>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control', 'required')) }}

    </p>
    <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
<span class="help-block">Leave the password field empty to keep existing password.</span>
    </p>
    <p>
        {{ Form::label('password_confirmation', 'Re-enter Password') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </p>
   
    <p>{{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }} <a href="#">Forgotten password?</a></p>
</form>{{ Form::close() }}

</article>
@stop
