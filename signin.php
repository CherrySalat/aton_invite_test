<?php
$notAuth = $_COOKIE['notAuth'];
?>
<!doctype html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <h1>Авторизация</h1>
    <form action="/index.php" method="post">
        <p>
            <input type="text" name="login" placeholder="Логин" />
        </p>
        <p>
            <input type="password" name="password" placeholder="Пароль" />
        </p>
        <?php if (isset($notAuth)) { ?>
            <p>Вы ввели неверный логин или пароль</p>
        <?php } ?>
        <button type="submit">Нажми меня</button>
    </form>
</body>

</html>
