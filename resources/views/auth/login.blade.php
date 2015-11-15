@extends('layouts.blank')
@section('title','login')

@section('content')
<div class="container-fluid">
	<div class="row">
		<br><br><br><br><br><br>
		<div class="col-sm-6 col-sm-offset-3 jumbotron">
			<h1 class="text-center">Log In</h1>

			<form class="form-horizontal" method="POST" action="/auth/login">
			{!! csrf_field() !!}
			  <fieldset >
			    <legend class="text-center">Please log in to continue, or you can also <a href="/auth/register">register</a></legend>
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
			      <div class="col-lg-10">
			        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="Email">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
			      <div class="col-lg-10">
			        <input  type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
			        <div class="checkbox">
			          <label>
			            <input type="checkbox"  name="remember"> Remember next time
			          </label>
			        </div>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-primary">Login</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	</div>
</div>

@endsection