<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori Güncelleme</title>
</head>
<body>

<a href="{{ route('categories.index') }}">Kategori Listesi</a>
<br><br><br><br>

<form action="{{ route('categories.update', $category->id) }}" method="post">
    @method('PUT')
    @csrf
    <label for="name">İsim: </label>
    <input type="text" name="name" id="name" value="{{ $category->name }}">

    <button type="submit">Güncelle</button>
</form>

</body>
</html>
