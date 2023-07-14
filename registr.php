<?php


// Получение значений из POST-параметров
$username = $_POST['username'];
$password = $_POST['password'];

// Установка соединения с базой данных
$db = new SQLite3('users.db');

// Вставка данных нового пользователя в таблицу "users"
$insertQuery = "INSERT INTO users (username, password) VALUES (:username, :password)";
$statement = $db->prepare($insertQuery);
$statement->bindValue(':username', $username, SQLITE3_TEXT);
$statement->bindValue(':password', $password, SQLITE3_TEXT);
$statement->execute();

// Закрытие соединения с базой данных
$db->close();

// Перенаправление пользователя на страницу после регистрации
header('Location: registration_success.php');
exit();
?>
