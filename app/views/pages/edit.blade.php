@extends('redminportal::layouts.master')

@section('content')
@if($errors->has())
<div class='alert alert-danger'>
    We encountered the following errors:
    <ul>
        @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

{{ Form::open(array('files' => TRUE, 'action' => 'PageController@postStore', 'role' => 'form')) }}
{{ Form::hidden('id', $page->id)}}

<div class='row'>
    <div class="col-md-3 col-md-push-9">
        <div class='form-actions text-right'>
            {{ HTML::link('admin/pages', 'Cancel', array('class' => 'btn btn-default'))}}
            {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
        </div>
        <hr>
        <div class='well well-small'>
            <div class="form-group">
                <label for="active" class="checkbox inline">
                    {{ Form::checkbox('active', $page->active, $page->active, array('id' => 'active-checker')) }} Active
                </label>
            </div>
        </div>


    </div>

    <div class="col-md-9 col-md-pull-3">

        <div class="tab-content">
            <div class="tab-pane active" id="lang-en">
                <div class="form-group">
                    {{ Form::label('name', 'Title') }}
                    {{ Form::text('name', $page->name, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('short_description', 'Summary') }}
                    {{ Form::text('short_description', $page->short_description, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('long_description', 'Description') }}
                    {{ Form::textarea('long_description', $page->long_description, array('class' => 'form-control')) }}
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
