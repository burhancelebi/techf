<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $category->title }}</title>
</head>
<body>

<h1>Kategori: {{ $category->name }}</h1>

Kategoriye ait makaleler

@foreach($blogs as $blog)
    <div>
        <h3><a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a></h3>
    </div>

    <hr>
@endforeach

</body>
</html>
