<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lawbase : @yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">LawBase</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="/articles">Articles <span class="sr-only">(current)</span></a></li>
	        <!-- <li><a href="#">Link</a></li> -->
	      </ul>
	      <form class="navbar-form navbar-left" role="search" action="/articles/search" method="post">
			{!! csrf_field() !!}
          	<input type="text" class="hidden" name="_filter" value="false">
	        <div class="form-group">
	          <input type="text" class="form-control" name="query" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/auth/logout">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<!-- container -->
	@yield('content')
</body>
</html>