@extends('layout')
@section('dashboard-content')

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Product Name </th>
                        <th> Product Price </th>
                        <th> Product Discount </th>
						<th> Restaurant Name</th>
                        <th> Product Category </th>
                        <th> Product Photo </th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> Product Name </th>
                        <th> Product Price </th>
                        <th> Product Discount </th>
						<th> Restaurant Name</th>
                        <th> Product Category </th>
                        <th> Product Photo </th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($products as $product)

                        <tr>
                            <td> {{ $product->name }} </td>
                            <td> {{ $product->price }} </td>
                            <td> {{ $product->discount }} </td>
							
							@if(empty($product->restaurant->name))
								<td> Deleted </td>
							@else
								<td> {{ $product->restaurant->name }} </td>
							@endif
							
							@if(empty($product->category->name))
								<td> Deleted </td>
							@else
								<td> {{ $product->category->name }} </td>
							@endif
							
							
                            
                            <td> <img src="{{ $product->photo }}" width="100" height="100"></td>
                            <td>
                                <a href="{{ URL::to('edit-product') }}/{{ $product->id }}" class="btn btn-outline-primary btn-sm"> Edit </a>
                                |
                                <a href="{{ URL::to('delete-product') }}/{{ $product->id }}" class="btn btn-outline-danger btn-sm" > Delete </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

@stop
