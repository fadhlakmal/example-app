<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        @csrf
        <input type="text" placeholder="Nilai A" id="nilaia" name="nilaia">
        <select name="operator" id="operator">
            <option name="" value="">Operator</option>
            <option name="+" value="+">+</option>
            <option name="-" value="-">-</option>
            <option name="*" value="*">*</option>
            <option name="/" value="/">/</option>
        </select>
        <input type="text" placeholder="Nilai B" id="nilaib" name="nilaib">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if ($_GET) {
        echo 'Nilai A : ' . $_GET['nilaia'];
        echo '<br>';
        echo 'Nilai B : ' . $_GET['nilaib'];
        echo '<br>';
        echo 'operator : ' . $_GET['operator'];
        if ($_GET) {
            if ($_GET['operator'] == '+') {
                $result = $_GET['nilaia'] + $_GET['nilaib'];
            } elseif ($_GET['operator'] == '-') {
                $result = $_GET['nilaia'] - $_GET['nilaib'];
            } elseif ($_GET['operator'] == '*') {
                $result = $_GET['nilaia'] * $_GET['nilaib'];
            } elseif ($_GET['operator'] == '/') {
                $result = $_GET['nilaia'] / $_GET['nilaib'];
            } else {
                return false;
            }
            echo '<br>';
            echo 'Hasil = ' . $result;
        }
    }

    ?>
</body>

</html>
