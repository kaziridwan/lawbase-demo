<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.master')

@section('title', 'Search')

@section('content')
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-8 col-sm-offset-4">
    			<h3 class="text-primary text-center">Searching <span class="text-info">"{{$query}}"</span> in Articles...</h3>
				@if(is_array($articles))
					@if($articles == [])
    				<h4 class="text-warning text-center">No articles found...</h4>
    				@endif					
				@else
					@if($articles->toArray() == [])
    				<h4 class="text-warning text-center">No articles found...</h4>
    				@endif
				@endif
    		</div>
    		<div class="col-sm-4">
    			<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"> Filter
						<span class="text-muted">by</span>
						<span class="text-primary">Author</span>
				    </h3>
				  </div>
				  <div class="panel-body">
				    <?php 
				    	$authors = [];
				    	foreach ($articles as $article) {
				    		$authors[] = $article->author;
				    	}
				    	$authors = array_unique($authors);
				     ?>
				     @if($filter == "false")
				     <ul>
					  @foreach($authors as $author)
					  <li>
						<form action="/articles/search" method="post" style="display:inline">
							{!! csrf_field() !!}
					        <input type="text" class="hidden" name="query" value="{{$query}} BY {{$author}}">
					        <input type="text" class="hidden" name="_filter" value="true">
					        <button type="submit" class="badge badge-info" style="display:inline">{{$author}}</button>
				      	</form>
					  </li>
					  @endforeach
					  </ul>
					  @endif
				  </div>
				</div>
    		</div>
    		<div class="col-sm-8">
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