<?php
if (isset($_POST["login"]) && isset($_POST["password"])) {

    $login = htmlentities($_POST["login"]);
    $password = htmlentities($_POST["password"]);

    $db = new SQLite3(
        './db/db.sqlite',
        SQLITE3_OPEN_CREATE
            | SQLITE3_OPEN_READWRITE
    );

    $query = 'SELECT * FROM "users" WHERE "login" = \''
        . SQLite3::escapeString($login)
        . '\'  AND "password" =\''
        . SQLite3::escapeString($password)
        . '\'  LIMIT 1';

    $userData = $db->querySingle($query, true);
    $db->close();

    if (sizeof($userData) !== 0) {
        setcookie('fio', $userData['fio']);
    } else {
        setcookie('notAuth', '1');
    }
}

if (!isset($_COOKIE['fio'])) {
    header("Location: /signin.php");
} else {
    header("Location: /list.php");
}
