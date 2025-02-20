<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategoriler</title>
</head>
<body>

@foreach($categories as $category)
    <div>
        <h3><a href="{{ route('category.blogs', $category->id) }}">{{ $category->name }}</a></h3>
    </div>
@endforeach

</body>
</html>
