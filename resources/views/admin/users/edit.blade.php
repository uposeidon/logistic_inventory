@extends('layouts.admin')
@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
   <h6 class="border-bottom border-gray p-3">{{ __('Update User') }}</h6>
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible" >
         <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
         </ul>
      </div>
   @endif
   <form method="post" action="{{ route('admin.users.update',$user->id) }}">
      @csrf
      @method('PUT')
      <div class="form-group row">
         <label for="name" class="col-sm-2 col-form-label">Name</label>
         <div class="col-sm-10">
            <input type="text" value="@if(old('name')){{ old('name') }}@else{{ $user->name }}@endif" class="form-control" id="name" name="name" placeholder="Enter User Name">
         </div>
      </div>
      <div class="form-group row">
         <label for="email" class="col-sm-2 col-form-label">Email</label>
         <div class="col-sm-10">
            <input type="text" value="@if(old('email')){{ old('email') }}@else{{ $user->email }}@endif" class="form-control" id="email" name="email" placeholder="Enter User Email">
         </div>
      </div>
      <div class="form-group row">
         <label for="password" class="col-sm-2 col-form-label">New Password</label>
         <div class="col-sm-10">
            <input type="password" value="" class="form-control" id="password" name="password" placeholder="********">
         </div>
      </div>
      <div class="form-group row">
         <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm New Password</label>
         <div class="col-sm-10">
            <input type="password" value="" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********">
         </div>
      </div>
      <div class="form-group row">
         <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
         <div class="col-sm-10">
            <select id="is_active" name="is_active" class="form-control form-control-sm">
               <option @if ($user->is_active == '1') selected @endif value="1">Yes</option>
               <option @if ($user->is_active == '0') selected @endif value="0">No</option>
            </select>
         </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
   </form>
</div>
@endsection