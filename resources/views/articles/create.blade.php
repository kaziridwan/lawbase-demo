<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Articles')

@section('content')
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<h2 class="text-primary text-center">Create new article &nbsp; <a href="/articles/create"><button class="btn btn-xs btn-primary">Reset</button></a></h2>

				<form class="form-horizontal" method="POST" action="/articles">
					{!! csrf_field() !!}
					<fieldset >
					<div class="form-group">
					  <label for="title" class="col-lg-2 control-label">Title</label>
					  <div class="col-lg-10">
					    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					  </div>
					</div>
					<div class="form-group hidden">
					  <label for="author" class="col-lg-2 control-label">Author</label>
					  <div class="col-lg-10">
					    <input type="text" name="author" class="form-control" id="author" placeholder="Author" value="{{Auth::user()->name}}">
					  </div>
					</div>
					<div class="form-group">
					  <label for="description" class="col-lg-2 control-label">Description</label>
					  <div class="col-lg-10">
					    <textarea type="text" name="description" class="form-control" id="description"></textarea>
					  </div>
					</div>
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
					    <button type="submit" class="btn btn-primary">Create</button>
					  </div>
					</div>
					</fieldset>
				</form>

    		</div>
    	</div>
    </div>
@endsection