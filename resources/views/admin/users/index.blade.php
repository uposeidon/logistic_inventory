@extends('layouts.admin')
@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
   <h6 class="border-bottom border-gray p-3 ">{{ __('Users') }}</h6>
   @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
   <div class="table-responsive">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Is Active</th>
               <th>Created At</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>@if ($user->is_active=='1') {{'Yes'}} @else {{'No'}} @endif</td>
               <td>{{ $user->created_at }}</td>
               <td>
                  <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                 | <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="event.preventDefault();document.getElementById('destory_{{$user->id}}').submit();">Delete</a>
                  <form method="post" name="destroy" id="destory_{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}">
                     @csrf 
                     @method('DELETE')
                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
@endsection


