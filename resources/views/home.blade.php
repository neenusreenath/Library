@extends('layouts.base')

@section('content')
<section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        	   <div class="cart-main-area section-padding--lg bg--white">
            
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                                 
                            <div class="table-content wnro__table table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="title-top">
                                        	<th class="product-thumbnail">Book Id</th>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-thumbnail">Book Price</th>
                                            <th class="product-name">Book Title</th>
                                            <th class="product-name">Edit Book Data</th>
                                            <th class="product-name">Delete Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($book as $books)  
                                        <tr>
                                            
                                        	<td class="product-thumbnail">{{$books->id}}</td>

                                            <td class="product-thumbnail"><a href="library/{{$books->id}}"><img src="uploads/{{$books->image}}" alt="product img"></a></td>
                                             <td class="product-thumbnail">{{$books->price}}</td>
                                            <td class="product-name">{{$books->title}}</td>
                                            <td class="product-name"><a href="library/{{$books->id}}/edit">EDIT</a></td>
                                            <td class="product-name">
                                                <form action="{{url('library', [$books->id])}}"  method="POST">
                                                     @method('DELETE')
                                            @csrf
                                           
                                                <input type="submit"  class="btn btn-info btn-block" value="DELETE" >
                                            </form>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            {{ $book->links() }}
                        
                
            </div>  
        </div>
     </div>
</section>
@endsection