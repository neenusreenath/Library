@extends('layouts.base')

@section('content')
<section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		
        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Add Your Book Here....</h3>
        					<div class="customar__field">
        						<form action="/library" method="post" enctype="multipart/form-data"77>
                                                                {{csrf_field()}}
	        						<div class="input_box">
	        							<label>Name of Book <span>*</span></label>
	        							<input type="text" name="title">
	        						</div>
	        						<div class="input_box">
	        							<label>Author <span>*</span></label>
	        							<input type="text" name="author">
	        						</div>
        						
        						<div class="input_box">
        							<label>Price <span>*</span></label>
        							<input type="text" name="price">
        						</div>
        						<div class="input_box">
                                                                <label>Publisher <span>*</span></label>
                                                                <input type="text" name="publisher">
                                                        </div>
        						
        					        <div class="input-default-wrapper mt-3">

                                                                <span class="input-group-text mb-3" id="input1">Upload Your Book Image</span>&nbsp;&nbsp;&nbsp;

                                                                <input type="file" class="input-default-js" name="image">

                                                        </div>
                                                        <br>
                                                        <div class="btn">
                                                                <input type="submit" name="submit" class="btn btn-secondary btn-lg">
                                                        </div>
        				</form>
        		</div>
        	</div>
        </section>
        @endsection