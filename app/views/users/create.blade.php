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
    <h1>New customers</h1>
    <p>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, array('class' => 'form-control', 'required')) }}
    </p>
    <p>
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, array('class' => 'form-control', 'required')) }}

    </p>
    <p>
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control', 'required')) }}

    </p>
    <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'required')) }}

    </p>
    <p>
        {{ Form::label('password_confirmation', 'Re-enter Password') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control', 'required')) }}

    </p>
   
    <p>{{ Form::submit('Create', array('class' => 'btn btn-primary')) }} <a href="#">Forgotten password?</a></p>
</form>{{ Form::close() }}

</article>
@stop
