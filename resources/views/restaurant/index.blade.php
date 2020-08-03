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

        <!-- Begin Page Content -->
        

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> Restaurant Name </th>
						<th> Restaurant Image </th>
						<th> Restaurant No </th>
						<th> Restaurant Address </th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th> Restaurant Name </th>
						<th> Restaurant Image </th>
						<th> Restaurant No </th>
						<th> Restaurant Address </th>
                        <th>Actions </th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($restaurants as $restaurant)

                        <tr>
                            <td> {{ $restaurant->name }} </td>
							<td> <img src="{{$restaurant->image}}" width="100" height="100"> </td>
							<th>{{ $restaurant->telephone }} </th>
							<th>{{ $restaurant->address }} </th>
                            <td>
                                <a href="{{ URL::to('edit-restaurant') }}/{{ $restaurant->id }}" class="btn btn-outline-primary btn-sm"> Edit </a>
                                |
                                <a href="{{ URL::to('delete-restaurant') }}/{{ $restaurant->id }}" class="btn btn-outline-danger btn-sm"> Delete </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
              </div>
            </div>
          </div>

    



@stop
