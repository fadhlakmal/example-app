<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="">
        @csrf
        Nama: <input type="text" name="nama"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        if ($_GET) {
            echo 'Nama: '.$_GET['nama'];
            echo '<br>';
            echo 'Email: '.$_GET['email'];
        }
    ?>
</body>

</html>
