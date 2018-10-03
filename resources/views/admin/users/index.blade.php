@extends('layouts.admin')



@section('content')
@if(session('message'))
  @include('partials.alert')
@endif

<h2>Manage Users <a href="{{ url('admin/users/create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>&nbsp;User</a></h2>
<br>
<div class="table-responsive">
<table class="table table-striped table-sm component bg-white shadow-sm">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
      <th>Premium</th>
      <th>Created At</th>
      <th>Updated At</th>
      <th>IsAdmin</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
      @include('admin.users.delete')
        <tr>
          
            <td>{{ $user->getId() }}</td>
            <td>{{ $user->getUsername() }}</td>
            <td>{{ $user->getEmail() }}</td>
            <td>{{ $user->isPremium() ? 'true':'false' }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>     
            <td>{{ $user->hasAdminRole() ? 'true':'false' }}</td>    
            <td><a href="{{url('admin/users/' .$user->getId().'/edit')}}"><i class="fas fa-user-edit"></i></a></td>
           
            <td>
               @if(auth()->id() != $user->id)
              <a data-toggle="modal" data-target="#confirmDeleteUser{{$user->id}}" href="#confirmDeleteUser{{$user->id}}"><i class="fas fa-trash"></i></a>                     
               @endif
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
</div>

{{ $users->links() }}

@endsection