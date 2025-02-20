<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Listesi</title>
</head>
<body>

<a href="{{ route('blogs.create') }}">Blog Ekle</a>
<br><br><br><br>

<table>
    <thead>
        <th>İsim</th>
        <th>Kategori</th>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->category->name }}</td>
                <td><a href="{{ route('blogs.edit', $blog->id) }}">Güncelle</a></td>
                <td></td>
                <td>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
