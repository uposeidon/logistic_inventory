@extends('layouts.admin')
@section('content')
<div class="my-3 row p-3 bg-white rounded box-shadow">
   <div class="col-12">
      <h6 class="border-bottom border-gray p-3 ">{{ __('Analyze') }}</h6>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Date Uploaded</th>
                  <th>File Name</th>
                  <th>Progress</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($suppliersFiles as $suppliersFile)
               <tr>
                  <td>{{ $suppliersFile->id }}</td>
                  <td>{{ $suppliersFile->created_at }}</td>
                  <td><a href="{{ route('admin.analyze.download',$suppliersFile->id) }}">{{ $suppliersFile->file_name }}</a></td>
                  <td>progress bar 0/0</td>
                  <td>{{ $suppliersFile->status }}</td>
                  <td>
                     <a href="{{ route('admin.analyze.index') }}">View</a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-12">
      {{ $suppliersFiles->appends($_GET)->links() }}
   </div>
</div>
   

@endsection


