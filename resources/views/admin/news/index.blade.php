<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Daftara News </h1>
    @foreach ($news as $item)
        <h2>{{ $item->title}}</h2>
        <p>Kategori: {{$item->category->name}}</p>
        <p>Author: {{$item->author->name}}</p>
        <p>Status: {{$item->status}}</p>
</body>
</html>