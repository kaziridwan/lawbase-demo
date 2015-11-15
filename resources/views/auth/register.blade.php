@extends('layouts.blank')
@section('title','register')

@section('content')
<div class="container-fluid">
	<div class="row">
		<br><br><br><br><br><br>
		<div class="col-sm-6 col-sm-offset-3 jumbotron">
			<h1 class="text-center">Register</h1>

			<form class="form-horizontal" method="POST" action="/auth/register">
			{!! csrf_field() !!}
			  <fieldset >
			    <legend class="text-center">Fill up the form to register, or you can also <a href="/auth/login">Login</a></legend>
			    
			    <div class="form-group">
			      <label for="inputName" class="col-lg-2 control-label">Name</label>
			      <div class="col-lg-10">
			        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName" placeholder="Name">
			      </div>
			    </div>
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
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
			      <div class="col-lg-10">
			        <input  type="password" name="password_confirmation" class="form-control" id="inputPassword" placeholder="Password">
			      </div>
			    </div>

			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-success">Register</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	</div>
</div>

@endsection