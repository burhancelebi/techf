<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Ekleme</title>
</head>
<body>

<a href="{{ route('blogs.index') }}">Blog Listesi</a>
<br><br><br><br>


<form action="{{ route('blogs.update', $blog->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="title">İsim: </label>
    <input type="text" name="title" id="title" value="{{ $blog->title }}">
    <label for="content">İçerik: </label>
    <textarea name="content" id="content" cols="30" rows="10">
        {{ $blog->content }}
    </textarea>
    <label for="category_id">Kategori: </label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $blog->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>

    <button type="submit">Güncelle</button>
</form>

</body>
</html>
