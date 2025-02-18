<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
        <h1> Daftar Buku</h1>
        @foreach ($books as $book)
        <h2>{{$book->Judul}}</h2>
            <p>{{ $book->Isi}}</p>
        @endforeach
    </body>
</html>