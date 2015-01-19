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
		@if (count($users) > 0)
		<span class="label label-default pull-left">
			{{ $users->getFrom() . ' to ' . $users->getTo() . ' ( total ' . $users->getTotal() . ' )' }}
		</span>
		@endif
		{{ HTML::link('admin/users/create', 'Create New', array('class' => 'btn btn-primary')) }}
	</div>

	@if (count($users) > 0)
		<table class='table table-striped table-bordered'>
			<thead>
				<tr>
					<th>Email</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Groups</th>
					<th>Activated</th>
					<th>Last Login</th>
					<th>Create</th>
					<th>Updated</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		    @foreach ($users as $user)
			    <tr>
			        <td>{{ $user->email }}</td>
			        <td>{{ $user->first_name }}</td>
			        <td>{{ $user->last_name }}</td>
			        <td>
						@foreach($user->getGroups() as $group)
						<span class="label label-info">{{ $group->name }}</span>
						@endforeach
					</td>
			        <td>
			            @if ($user->activated)
			                 <span class="label label-success"><span class='glyphicon glyphicon-ok'></span></span>
                        @else
                            <span class="label label-danger"><span class='glyphicon glyphicon-remove'></span></span>
                        @endif
		            </td>
			        <td>{{ $user->last_login }}</td>
			        <td>{{ $user->created_at }}</td>
			        <td>{{ $user->updated_at }}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								@if ($user->activated)
									<li>
										<a href="{{ URL::to('admin/users/deactivate/' . $user->id) }}">
											<i class="glyphicon glyphicon-eye-close"></i>Deactivate</a>
									</li>
								@else
									<li>
										<a href="{{ URL::to('admin/users/activate/' . $user->id) }}">
											<i class="glyphicon glyphicon-eye-open"></i>Activate</a>
									</li>
								@endif
								<li>
									<a href="{{ URL::to('admin/users/edit/' . $user->id) }}">
										<i class="glyphicon glyphicon-edit"></i>Edit</a>
								</li>
                                <li>
									<a href="{{ URL::to('admin/users/delete/' . $user->id) }}" class="btn-confirm">
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
		{{ $users->links() }}
        </div>
	@else
		<div class="alert alert-info">No user found</div>
	@endif
@stop
