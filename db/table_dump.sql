PRAGMA foreign_keys=OFF;

BEGIN TRANSACTION;


CREATE TABLE users
(
    fio TEXT PRIMARY KEY ,
    login TEXT,
    password TEXT
);


CREATE TABLE clients
(
    account_id INTEGER PRIMARY KEY AUTOINCREMENT,
    firstname TEXT NOT NULL, 
    surname TEXT,
    secondname TEXT, 
    birthday DATE ,
    inn TEXT,
    user_fio TEXT,
    status_id INTEGER,
    FOREIGN KEY (user_fio)  REFERENCES users(fio),
    FOREIGN KEY (status_id)  REFERENCES status (id)
);


CREATE TABLE status
(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    Name TEXT
);


--Заполняем пользователей
INSERT INTO users VALUES('Бободжан','111','111');

--Заполняем статусы
INSERT INTO status VALUES(1,'Не в работе');
INSERT INTO status VALUES(2,'В работе');
INSERT INTO status VALUES(3,'Отказ');
INSERT INTO status VALUES(4,'Сделка закрыта');

--Заполняем клиентов
INSERT INTO clients VALUES(1,"Лев", "Николаевич", "Толстой", datetime('now'), "123456789012",  'Бободжан', 1);
INSERT INTO clients VALUES(2,"Александр", "Пушкин",   "Сергеевич", datetime('now'), "123456789013", 'Бободжан', 2);
INSERT INTO clients VALUES(3,"Михаил","Юрьевич", "Лермонтов",  datetime('now'), "123456789014", 'Левкевич', 3);

DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('clients',1);
COMMIT;
