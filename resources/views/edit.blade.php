
@extends('layouts.base')

@section('content')
<div class="row">
	<div class="col-sm-4">
			<br>
			&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="rounded" src="{{url('uploads/'.$book->image)}}" alt="product img" width="304" height="236">
	</div>
	<div class="col-sm-8" style="background-color:lavender;">
		<form method="post" action="/library/{{$book->id }}" enctype="multipart/form-data">
      @method('PUT')
      {{csrf_field()}}
			<br><br>
			
			<h5><span class =" label label-default">Book Title  :</span>
				
				<input type="text" name="title" value="{{$book->title}}" class="form-control form-rounded"><br>
				<span class =" label label-default">Author of the Book  :</span>
				
				<input type="text" name="author" value="{{$book->author}}" class="form-control form-rounded"><br>
				<span class =" label label-default">Price of the Book  :</span>
				
				<input type="text" name="price" value="{{$book->price}}" class="form-control form-rounded"><br>
				<span class =" label label-default">Publisher of the Book  :</span>
				
				<input type="text" name="publisher" value="{{$book->publisher}}" class="form-control form-rounded"><br>
				<div class="input-default-wrapper mt-3">

                    <span class="input-group-text mb-3" id="input1">Upload New Image</span>&nbsp;&nbsp;&nbsp;

                    <input type="file" class="input-default-js" name="image">

                </div>
                <br>
                <div class="btn">
                    <input type="submit" name="submit" class="btn btn-secondary btn-lg" value="Update">
                </div>
            </h5>
		</form>
	</div>
</div>
 @endsection