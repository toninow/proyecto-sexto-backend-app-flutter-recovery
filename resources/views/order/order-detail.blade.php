@extends('layout')
@section('dashboard-content')

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
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
              <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Product Name </th>
						<th> Product Price </th>
						<th> Discount </th>
						<th> Product Photo</th>
						<th> Status</th>
						<th> Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                       <th> Product Name </th>
						<th> Product Price </th>
						<th> Discount </th>
						<th> Product Photo </th>
						<th> Status</th>
						<th> Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($orderDetails as $orderDetail)

                        <tr>
                            <td> {{ $orderDetail->order_product_name }} </td>
							<td> {{ $orderDetail->product_order_price }} </td>
							<td> {{ $orderDetail->product_order_discount }} </td>
							<td>  
								<img src ="{{ $orderDetail->product_photo }}" height="100" />
							</td>
							<td> {{ $orderDetail->status }} </td>
							
                            <td>
								
                                <a href="{{ URL::to('approve-order-detail') }}/{{ $orderDetail->id }}" class="btn btn-outline-primary btn-sm"> Approve </a>
                                |
                                <a href="{{ URL::to('cancel') }}/{{ $orderDetail->id }}" class="btn btn-outline-danger btn-sm"> Cancel </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

   

@stop
