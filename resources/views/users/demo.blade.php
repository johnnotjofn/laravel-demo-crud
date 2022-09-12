<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/users/demo" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="file">
    <br>
    <button type="submit">Import</button>
    @if(session('success'))
        <h1>{{  session('success') }}</h1>
    @endif
    <br>
    @if(isset($errors) && $errors->any())
        <div>
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

    @if(session('fail'))
        <h1>{{  session('fail') }}</h1>
    @endif
</form>
</body>
</html>
