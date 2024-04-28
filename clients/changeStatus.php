<?php
//if (isset($_REQUEST['account_id']) && $_REQUEST['val']) {
$db = new SQLite3(
    '../db/db.sqlite',
    SQLITE3_OPEN_CREATE
        | SQLITE3_OPEN_READWRITE
);

//$db->enableExceptions(true);
//syslog(LOG_INFO, $_REQUEST['id']);
$id = $_REQUEST['id'];
$val = $_REQUEST['val'];
$query = 'SELECT * FROM "users" WHERE "login" = 
            \''
    //. SQLite3::escapeString($login)
    . '\'  AND "password" =\''
    //. SQLite3::escapeString($password)
    . '\'  LIMIT 1';


$query = 'UPDATE clients
        SET status_id = ' . SQLite3::escapeString($val) . '
        WHERE account_id = ' . SQLite3::escapeString($id) . ';';

$userData = $db->exec($query);
$db->close();

//}
