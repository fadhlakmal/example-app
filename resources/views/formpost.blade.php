<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @if(isset($nama) && isset($email))
        <h2>Data yang Dikirim:</h2>
        <p>Nama: {{ $nama }}</p>
        <p>Email: {{ $email }}</p>
    @else
        <h1>Form Post</h1>
        <form method="POST" action="/formpost">
            @csrf
            Nama: <input type="text" name="nama"><br>
            Email: <input type="text" name="email"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    @endif
</body>

</html>
