@extends('layouts.admin')
@section('content')
<div class="my-3 row p-3 bg-white rounded box-shadow">
   <div class="col-12">
      <h6 class="border-bottom border-gray p-3 ">{{ __('Analyze Data') }}</h6>
      <div class="table-responsive">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>AID</th>
                  <th>UPC</th>
                  <th>EAN</th>
                  <th>ASIN</th>
                  <th>Model</th>
                  <th>Brand</th>
                  <th>MSRP Amount</th>
                  <th>Created At</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($supplierAlgopixs as $supplierAlgopix)
               <tr>
                  <td>{{ $supplierAlgopix->id }}</td>
                  <td>{{ $supplierAlgopix->aid }}</td>
                  <td>{{ $supplierAlgopix->upc }}</td>
                  <td>{{ $supplierAlgopix->ean }}</td>
                  <td>{{ $supplierAlgopix->asin }}</td>
                  <td>{{ $supplierAlgopix->model }}</td>
                  <td>{{ $supplierAlgopix->brand }}</td>
                  <td>{{ $supplierAlgopix->msrp_amount }}</td>
                  <td>{{ $supplierAlgopix->created_at }}</td>
                  <td>
                     <a href="{{ route('admin.analyze.show',[$supplierAlgopix->suppliers_files_id, $supplierAlgopix->id])}}">show full Data</a>
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
      {{ $supplierAlgopixs->appends($_GET)->links() }}
   </div>
</div>
   

@endsection


