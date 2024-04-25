<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$db = new SQLite3('db.sqlite'
        , SQLITE3_OPEN_CREATE 
        | SQLITE3_OPEN_READWRITE
);



$db->query('CREATE TABLE IF NOT EXISTS "visits" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "user_id" INTEGER,
    "url" VARCHAR,
    "time" DATETIME
)');

while ($row = $res->fetchArray()) {
    echo "{$row['id']} {$row['name']} {$row['price']} \n";
}

// Errors are emitted as warnings by default
// , enable proper error handling.



$db->enableExceptions(true);

$userData = [
    'login' => '123',
    'fio' => "Ебанат ебанькович",
    'password' => '123',
];

if (isset($_GET['exit']) || !isset($_POST['login'])) {
    unset($_COOKIE['fio']);
    setcookie('fio', '', -1, '/');
}

if(isset($_POST["login"]) && isset($_POST["password"]))
{
    $login = htmlentities($_POST["login"]);
    $password= htmlentities($_POST["password"]);
    if (  $login == $userData['login'] 
       && $password == $userData['password']
       ) 
    {
       setcookie('fio', $userData['fio']);
    } else {
        setcookie('notAuth','1');
    }
}


if (! isset($_COOKIE['fio'])) 
{
    require  "signin.html";
} else {
    require "list.php";
}

/*
$actualLink = (empty($_SERVER['HTTPS']) ? 'http' : 'https') 
    . "://$_SERVER[HTTP_HOST]";
if (! isset($_COOKIE['fio'])) 
{
    $actualLink .= "/signin.html";
} else {
    $actualLink .= "/list.php";
}

header("Location: " . $actualLink  );
exit;
*/
