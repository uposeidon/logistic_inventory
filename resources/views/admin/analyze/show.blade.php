@extends('layouts.admin')
@section('content')
<div class="my-3 p-3 bg-white rounded box-shadow">
   <h6 class="border-bottom border-gray p-3 ">{{ __('View Analyze') }}</h6>
   <div class="table-responsive">
      <table class="table table-bordered">
         <tbody>
           <tr>
              <td>ID</td>
              <td>{{ $supplier->id }}</td>
            </tr>
            <tr>
              <td>Seller</td>
              <td>{{ $supplier->seller }}</td>
            </tr>
            <tr>
              <td>Listing ID</td>
              <td>{{ $supplier->listing_id }}</td>
            </tr>
            <tr>
              <td>Description</td>
              <td>{{ $supplier->description }}</td>
            </tr>
            <tr>
              <td>X-Z ASIN</td>
              <td>{{ $supplier->x_z_asin }}</td>
            </tr>
            <tr>
              <td>UPC</td>
              <td>{{ $supplier->upc }}</td>
            </tr>
            <tr>
              <td>B00 ASIN</td>
              <td>{{ $supplier->boo_asin }}</td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td>{{ $supplier->quantity }}</td>
            </tr>
            <tr>
              <td>MSRP</td>
              <td>{{ $supplier->msrp }}</td>
            </tr>
            <tr>
              <td>EXT MSRP</td>
              <td>{{ $supplier->ext_msrp }}</td>
            </tr>
            <tr>
              <td>Package ID</td>
              <td>{{ $supplier->package_id }}</td>
            </tr>
            <tr>
              <td>Warehouse</td>
              <td>{{ $supplier->warehouse }}</td>
            </tr>
            <tr>
              <td>Created At</td>
              <td>{{ $supplier->created_at }}</td>
            </tr>
            </tbody>
      </table>
   </div>
@endsection


