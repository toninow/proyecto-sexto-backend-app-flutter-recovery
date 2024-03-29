@extends('layout')
@section('dashboard-content')
    <h1> Create category form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('update-restaurant') }}/{{ $restaurant->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Restaurant name</label>
            <input type="text" class="form-control" value="{{ $restaurant->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter restaurant name" name="restaurantName">
        </div>
		
		<div class="form-group">
            <label for="exampleInputEmail1"> Restaurant telephone</label>
            <input type="text" class="form-control" value="{{ $restaurant->telephone }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter restaurant telephone" name="restaurantTelephone">
        </div>
		
		<div class="form-group">
            <label for="exampleInputEmail1"> Restaurant address</label>
            <input type="text" class="form-control" value="{{ $restaurant->address }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter restaurant address" name="restaurantAddress">
        </div>
		
		
		<div class="form-group">
            <label for="exampleInputEmail1"> Restaurant image</label>
            <input type="file" class="form-control"  name="restaurantImage" onchange="loadPhoto(event)">
        </div>
		
		<div>
			<img id="photo" height="100" width="100">
		</div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
	
	 <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@stop
