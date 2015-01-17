@extends('redminportal::layouts.master')
@section('content')
<h1> Create Page </h1>
{{ Form::open(array('files' => TRUE, 'action' => 'PageController@postStore', 'role' => 'form')) }}

<div class='row'>
    <div class="col-md-3 col-md-push-9">
        <div class='form-actions text-right'>
            {{ HTML::link('admin/pages', 'Cancel', array('class' => 'btn btn-default'))}}
            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
        </div>
        <hr>
        <div class='well well-small'>


            <div class="form-group">
                <label for="active" class="checkbox inline">
                    {{ Form::checkbox('active', true, true, array('id' => 'active-checker')) }} Active
                </label>
            </div>
        </div>


    </div>

    <div class="col-md-9 col-md-pull-3">

        <div class="tab-content">
            <div class="tab-pane active" id="lang-en">
                <div class="form-group">
                    {{ Form::label('name', 'Title') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('short_description', 'Summary') }}
                    {{ Form::text('short_description', Input::old('short_description'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('long_description', 'Description') }}
                    {{ Form::textarea('long_description', Input::old('long_description'), array('class' => 'form-control')) }}
                </div>
            </div>

        </div>
    </div>
</div>
{{ Form::close() }}
@stop

@section('footer')
<script src="{{ URL::to('packages/redooor/redminportal/assets/js/bootstrap-fileupload.js') }}"></script>

@include('redminportal::plugins/tinymce')
@stop