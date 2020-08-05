@extends('layout')
@section('dashboard-content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-building"></i>
                    </div>
                    <div class="mr-5">{{ $countRestaurants }} Restaurants!</div>
                </div>
                <a class="card-footer text-black clearfix small z-1" href="#">
                    <span class="float-left">Manage Restaurants</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-th-list"></i>
                    </div>
                    <div class="mr-5">{{ $countCategories }} Categories</div>
                </div>
                <a class="card-footer text-black clearfix small z-1" href="#">
                    <span class="float-left">Manage Categories</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-coffee"></i>
                    </div>
                    <div class="mr-5">{{ $countProducts }} Foods</div>
                </div>
                <a class="card-footer text-black clearfix small z-1" href="#">
                    <span class="float-left">Manager Products</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">{{ $countOrders }} Orders!</div>
                </div>
                <a class="card-footer text-black clearfix small z-1" href="#">
                    <span class="float-left">Manage Orders</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>



    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Latest 10 Orders</div>
			
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

                    @foreach($latestOrders as $order)

                        <tr>
                            <td> {{ $order->id }} </td>
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
