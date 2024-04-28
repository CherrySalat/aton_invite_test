<?php

$fio = $_COOKIE['fio'];

$clientsList =
    [
        [
            "id_account" => '1',
            "fio" => 'ее йй уу',
            'birthday' => '1.1.2001',
            'inn' => '123',
            'status' => 3,
        ],
    ];



$db = new SQLite3(
    './db/db.sqlite',
    SQLITE3_OPEN_CREATE
        | SQLITE3_OPEN_READWRITE
);

$testQuery = ' SELECT account_id
             , SUBSTR(firstname,1,1) 
             || "." 
             || SUBSTR(surname,1,1) 
             || ". " 
             || secondname 
                as fio
             , birthday
             , inn
             , name 
             as `status` 
            FROM clients 
            JOIN status 
                ON status.id = clients.status_id 
            WHERE 
                user_fio = "Бободжан";';

$statuses = [null, "Не в работе", "В работе", "Отказ", "Сделка закрыта"];
$res = $db->query($testQuery);


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
    <script>
        function changeStatus(event) {
            let id = event.target.id;
            let val = event.target.value;
            let res = fetch(
                    `/clients/changeStatus.php?id=${id}&val=${val}`
                )
                .then(res => console.log(res))
                .catch(err => console.error(err));
        }
    </script>
    <header>
        <h1>Список <b><?= $fio; ?></b> клиентов</h1>
        <form action="/users/exit.php">
            <button type="submit">Выход</button>
        </form>
    </header>
    <table>
        <thead>
            <tr>
                <th>Номер счёта</th>
                <th>ФИО</th>
                <th>Дата рождения</th>
                <th>ИНН</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($client = $res->fetchArray()) {
            ?>
                <tr>
                    <td><?= $client['account_id'] ?></td>
                    <td><?= $client['fio'] ?></td>
                    <td><?= $client['birthday'] ?></td>
                    <td><?= $client['inn'] ?></td>
                    <td>
                        <select onchange="changeStatus(event)" id="<?= $client['id_accaunt'] ?>" name="client-status" id="client-status">
                            <option value="1" <?= $client['status'] === $statuses[1] ? 'selected=""' : ""; ?>>Не в работе</option>
                            <option value="2" <?= $client['status'] === $statuses[2] ? 'selected=""' : ""; ?>>В работе</option>
                            <option value="3" <?= $client['status'] === $statuses[3] ? 'selected=""' : ""; ?>>Отказ</option>
                            <option value="4" <?= $client['status'] === $statuses[4] ? 'selected=""' : ""; ?>>Сделка закрыта</option>
                        </select>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>
