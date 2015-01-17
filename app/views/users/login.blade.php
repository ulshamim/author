@extends('layouts.main')
@section('content')
<article class="login">
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
{{ Form::open(array('action' => 'LoginController@postLogin')) }}
        <h1>Existing customers</h1>
        <p><label for="email">Email</label>
            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => Lang::get('redminportal::forms.email'), 'required', 'autofocus')) }}
        </p>
        <p><label for="pasword">Password</label>
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => Lang::get('redminportal::forms.password'), 'required')) }}
        </p>
        <p><button>Sign in</button> <a href="#">Forgotten password?</a></p>
     {{ Form::close() }}
    <section>
        <h2>New to ABC comp?</h2>
        <p><a href="create" target="_parent"><button type="button">Continue</button></a></p>
    </section>
</article>
@stop