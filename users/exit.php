<?php
unset($_COOKIE);
setcookie('fio', '', -1, '/');
setcookie('notAuth', '', -1, '/');
header("Location: /");
