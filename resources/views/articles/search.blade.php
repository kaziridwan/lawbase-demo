<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Articles')

@section('content')
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<h2 class="text-primary text-center">Searching Articles...</h2>


    			@foreach($articles as $article)
    			<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title">{{$article->title}}
						<span class="text-muted">by</span>
						<span class="text-info">{{$article->author}}</span>
				    </h3>
				  </div>
				  <div class="panel-body">
				    {{$article->description}}
				  </div>
				</div>
				@endforeach

    		</div>
    	</div>
    </div>
@endsection