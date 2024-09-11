<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <h1>Isi Form</h1>
    <hr>
    <form action="/submit" method="POST">
        @csrf
        <label for="username">Nama</label>
        <input type="text" id="username" name="username">

        <label for="alamat">Alamat</label>
        <textarea type="text" id="alamat" name="alamat"></textarea>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
