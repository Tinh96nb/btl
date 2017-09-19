<!DOCTYPE html>
<html>
<head>
	<title>Abc</title>
</head>
<body>
	<h1>Hello word</h1>
	{{ $id }}
	<form method="post" action="{{route('post')}}">
		{{ csrf_field() }}
		<input type="text" name="username">
		<input type="submit" name="submit" value="Sent">
	</form>
</body>
</html>