@extends('layouts.admin')
@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
   <h6 class="border-bottom border-gray p-3">{{ __('Upload Manifest') }}</h6>
   @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif
   @if ($errors->any())
      <div class="alert alert-danger alert-dismissible" >
         <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
         </ul>
      </div>
   @endif
   <form method="post" enctype="multipart/form-data" action="{{ route('admin.csv.store') }}">
      @csrf
      <div class="form-group row">
         <label for="email" class="col-sm-2 col-form-label">Upload CSV File</label>
         <div class="col-sm-10">
         <input type="file" value="" class="form-control" id="csv" name="csv" placeholder="">
         </div>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
   </form>
</div>
@endsection