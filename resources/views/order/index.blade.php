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

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Orders </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Order ID </th>
						<th> Order Date </th>
						<th> Payment Type </th>
						<th> Total Amount </th>
						<th> User </th>
						<th> Status </th>
						<th> Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                         <th> Order ID </th>
						<th> Order Date </th>
						<th> Payment Type </th>
						<th> Total Amount </th>
						<th> User </th>
						<th> Status </th>
						<th> Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($orders as $order)

                        <tr>
                            <td> {{ $order->order_id }} </td>
							<td> {{ $order->order_date }} </td>
							<td> {{ $order->payment_type }} </td>
							<td> {{ $order->total_amount }} </td>
							<td> {{ $order->user->name}} </td>
							<th> {{ $order->status}} </th>
                            <td>
								<a href="{{ URL::to('order-detail') }}/{{ $order->id }}" class="btn btn-outline-primary btn-sm"> Order Detail </a>
                                <a href="{{ URL::to('approve-order') }}/{{ $order->id }}" class="btn btn-outline-primary btn-sm"> Approve </a>
                                |
                                <a href="{{ URL::to('cancel') }}/{{ $order->id }}" class="btn btn-outline-danger btn-sm"> Cancel </a>
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
