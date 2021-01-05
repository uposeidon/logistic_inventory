@extends('layouts.admin')
@section('content')
<div class="my-3 row p-3 bg-white rounded box-shadow">
   <div class="col-12">
      <h6 class="border-bottom border-gray p-3 ">{{ __('Analyze') }}</h6>
      
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
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th style="width:5%">ID</th>
                  <th style="width:15%">Date Uploaded</th>
                  <th style="width:20%">File Name</th>
                  <th style="width:30%">Progress</th>
                  <th style="width:15%">Status</th>
                  <th style="width:15%">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($supplierFiles as $suppliersFile)
               @php
                  $percetage = 0.0;
                  if($suppliersFile->total_records > 0){
                     $percetage = ($suppliersFile->process_records * 100) / $suppliersFile->total_records;
                     $percetage = ($percetage < 1) ?  ceil($percetage) : floor($percetage);
                  }
               @endphp
               <tr>
                  <td>{{ $suppliersFile->id }}</td>
                  <td>{{ $suppliersFile->created_at->format('d-m-Y') }}</td>
                  <td><a href="{{ route('admin.analyze.download',$suppliersFile->id) }}">{{ $suppliersFile->file_name }}</a></td>
                  <td>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$percetage}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     {{$percetage}}% {{ $suppliersFile->process_records }}/{{ $suppliersFile->total_records }} 
                  </td>
                  <td>
                     @if($suppliersFile->status=='new' && $suppliersFile->total_records > 0)
                        <a class="btn btn-primary" href="{{ route('admin.analyze.update', $suppliersFile->id) }}" onclick="event.preventDefault();document.getElementById('update_{{$suppliersFile->id}}').submit();">
                           {{ 'Start Analyzer' }}
                        </a>
                     @elseif($suppliersFile->status=='in-progress')
                        <a class="btn btn-danger" href="{{ route('admin.analyze.update', $suppliersFile->id) }}" onclick="event.preventDefault();document.getElementById('update_{{$suppliersFile->id}}').submit();">
                           {{ 'Stop Analyzer' }}
                        </a>
                     @elseif($suppliersFile->status == 'cancelled')
                        <a href="#" class="btn btn-secondary"> {{ 'Cancelled' }}</a>
                     @elseif($suppliersFile->status == 'done')
                        <a href="#" class="btn btn-success"> {{ 'Completed' }}</a>
                     @else
                        <a href="#" class="btn btn-info"> {{ 'No Records' }}</a>
                     @endif
                     <form method="post" name="update" id="update_{{$suppliersFile->id}}" action="{{ route('admin.analyze.update', $suppliersFile->id) }}">
                        @csrf 
                        @method('PUT')
                        <input type="hidden" name="status" value="{{$suppliersFile->status}}">
                     </form>
                     
                  </td>
                  <td>
                     <a href="{{ route('admin.analyze.view', $suppliersFile->id) }}">Analyze Data</a>
                     <a class="btn @if ($suppliersFile->supplier_algopixs_count == 0) disabled @endif" href="{{ route('admin.analyze.download_result',$suppliersFile->id) }}">Download</a>
                     
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
      {{ $supplierFiles->appends($_GET)->links() }}
   </div>
</div>
   

@endsection


