<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $blog->title }}</title>
</head>
<body>

<div>
    <h3>{{ $blog->title }}</h3>
    <h6>Kategori: {{ $blog->category->name }}</h6>
    <p>{!! $blog->content !!}</p>
</div>

</body>
</html>
