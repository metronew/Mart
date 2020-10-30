@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  
  <div class="row mb-4">
      <h1 class="h3 mb-0 text-gray-800">Product Management</h1>
  </div>
  <a href="{{route('product.create')}}" class="btn btn-primary mb-4">Add a Product</a>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product Datatable</h6>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="">Select all</label>
        <input type="checkbox" class="selectall">
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered small" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Select</th>
              <th>Title</th>
              <th>Code</th>
              <th>Price</th>
              <th>SalePrice</th>
              <th>onSale</th>
              <th>Stock</th>
              <th>Live</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection

@push('js')
<script>
$(document).ready(function(){
  $('#dataTable').dataTable({
  columnDefs:[
    {
      target:0,
      checkboxes:{
        selectRow:true
      }
    }
  ],
  select:{
    style:'multi'
  },
  processing:true,
  serverSide:true,
  ajax:"{{route('product.all')}}",
    columns:[
      {data:'select',orderable:false,searchable:false},
      {data:'title'},
      {data:'product_code'},
      {data:'price',orderable:false,searchable:false},
      {data:'sale_price',orderable:false,searchable:false},
      {data:'onSale',searchable:false},
      {data:'stock',orderable:false,searchable:false},
      {data:'live',searchable:false},
      {data:'actions',orderable:false,searchable:false},
    ]
  });

	$('.selectall').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall2').prop('checked', $(this).prop('checked'));
	})
	$('.selectall2').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall').prop('checked', $(this).prop('checked'));
	})
	$('.selectbox').change(function(){
		var total = $('.selectbox').length;
		var number = $('.selectbox:checked').length;
		if(total == number){
			$('.selectall').prop('checked', true);
			$('.selectall2').prop('checked', true);
		} else{
			$('.selectall').prop('checked', false);
			$('.selectall2').prop('checked', false);
		}
	})


})

</script>
@endpush