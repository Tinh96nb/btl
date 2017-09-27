<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<form action="{{ route('login') }}" method="POST" role="form">
					<legend>Login</legend>
					{{ csrf_field()}}
					<div class="form-group">
						@if ($errors->has('errlogin'))
							<div class="alert alert-danger">
								{{ $errors->first('errlogin')}}
							</div>
						@endif
						<label for="">Username</label>
						<input type="text" class="form-control" name="username" value="{{ old('username')}}">
						@if( $errors->has('username') )
							@foreach ($errors->get('username') as $message)
								{{ $message}}
							@endforeach
						@endif
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password">
						@if( $errors->has('password') )
							@foreach ($errors->get('password') as $message)
								{{ $message}}
							@endforeach
						@endif
					</div>
					<div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
					<button type="submit" class="btn btn-primary">Lgon</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>