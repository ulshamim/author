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

<div class="nav-controls text-right">
    @if (count($pages) > 0)
    <span class="label label-default pull-left">
        {{ $pages->getFrom() . ' to ' . $pages->getTo() . ' ( total ' . $pages->getTotal() . ' )' }}
    </span>
    @endif
    {{ HTML::link('admin/pages/create', 'Create New', array('class' => 'btn btn-primary')) }}
</div>

@if (count($pages) > 0)
<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>Name</th>
            <th>Short Description</th>
            <th class='hide'>Long Description</th>
            <th>Active</th>

            <th class='hide'>Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pages as $page)
        <tr>
            <td>{{ $page->name }}</td>
           
           
            <td>{{ $page->short_description }}</td>
            <td class='hide'>{{ $page->long_description }}</td>
           
            <td>
                @if ($page->active)
                <span class="label label-success"><span class='glyphicon glyphicon-ok'></span></span>
                @else
                <span class="label label-danger"><span class='glyphicon glyphicon-remove'></span></span>
                @endif
            </td>
           
            <td class='hide'>{{ $page->updated_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="{{ URL::to('admin/pages/edit/' . $page->id) }}">
                                <i class="glyphicon glyphicon-edit"></i>Edit</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/pages/delete/' . $page->id) }}" class="btn-confirm">
                                <i class="glyphicon glyphicon-remove"></i>Delete</a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
    {{ $pages->links() }}
</div>
@else
<div class="alert alert-info">No Pages found</div>
@endif
@stop
