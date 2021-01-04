@extends('layouts.admin')
@section('content')
<div class="my-3 row p-3 bg-white rounded box-shadow">
   <div class="col-12">
      <h6 class="border-bottom border-gray p-3 ">{{ __('Origin Manifest') }}</h6>
      <div class="row form-group">
         <div class="col-12">
            <form action="" method="get">
            <div class="form-row">
               <div class="form-group col-md-4">
                  <input type="text" placeholder="search by X-Z ASIN or UPC" value="{{ app('request')->input('search') }}" class="form-control" name="search" />
               </div>
               <div class="form-group col-md-4">
                  <input type="text" autocomplete="off" value="@if(app('request')->input('created_at')){{ app('request')->input('created_at') }}@else{{ date('m/d/Y') }}@endif" class="datepicker form-control" name="created_at">
               </div>
               <div class="form-group col-md-4">
                  <button type="submit" class="btn btn-primary">Search</button>
                  <a class="btn btn-primary" href="{{ route('admin.analyze.index') }}">Analyze</a>
               </div>
            </div>
            </form>
         </div>
      </div>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>X-Z ASIN</th>
                  <th>UPC</th>
                  <th>B00 ASIN</th>
                  <th>Quantity</th>
                  <th>MSRP</th>
                  <th>EXT MSRP</th>
                  <th>Package ID</th>
                  <th>Created At</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($suppliers as $supplier)
               <tr>
                  <td>{{ $supplier->id }}</td>
                  <td>{{ $supplier->x_z_asin }}</td>
                  <td>{{ $supplier->upc }}</td>
                  <td>{{ $supplier->boo_asin }}</td>
                  <td>{{ $supplier->quantity }}</td>
                  <td>{{ $supplier->msrp }}</td>
                  <td>{{ $supplier->ext_msrp }}</td>
                  <td>{{ $supplier->package_id }}</td>
                  <td>{{ $supplier->created_at }}</td>
                  <td>
                     <a href="{{ route('admin.supplier.show', $supplier->id) }}">View</a>
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
      {{ $suppliers->appends($_GET)->links() }}
   </div>
</div>
   

@endsection


