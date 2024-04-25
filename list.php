<?php

$fio = $_COOKIE['fio'];

$clientsList = 
[
    [
      //<th>Номер счёта</th>
      "id_account" => '1',
      // <th>ФИО</th>
      "fio" => 'ее йй уу',
      // <th>Дата рождения</th>
      'birthday' => '1.1.2001', 
      // <th>ИНН</th>
      'inn' => '123',
      // <th>Статус</th>
      'status' => 3,
    ], 
];
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
      function changeStatus(account_id) {
        alert(accoutn_id);
      }
    </script>
    <header>
<h1>Список <b><?= $fio; ?></b> клиентов</h1>
      <form action="/">
        <button type="submit" name="exit" >Выход</button>
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
foreach ($clientsList as $client) {
?>
        <tr>
            <td><?= $client['id_account'] ?></td>
            <td><?= $client['fio'] ?></td>
            <td><?= $client['birthday'] ?></td>
            <td><?= $client['inn'] ?></td>
          <td>
            <select onchange="vs(<?= $client['id_accaunt']?>)" name="client-status" id="client-status">
                    <option value="1" <?= $client['status'] === 1 ? 'selected=""' : "" ;?>  >Не в работе</option>
                    <option value="2" <?= $client['status'] === 2 ? 'selected=""' : "" ;?>  >В работе</option>
                    <option value="3" <?= $client['status'] === 3 ? 'selected=""' : "" ;?>  >Отказ</option>
                    <option value="4" <?= $client['status'] === 4 ? 'selected=""' : "" ;?>  >Сделка закрыта</option>
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
