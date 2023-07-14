<?php
session_start();

// Получение значений из POST-параметров
$username = $_POST['username'];
$password = $_POST['password'];

// Установка соединения с базой данных
$db = new SQLite3('users.db');

// Выполнение запроса для проверки соответствия введенных учетных данных с данными в базе данных
$query = "SELECT * FROM users WHERE username = :username AND password = :password";
$statement = $db->prepare($query);
$statement->bindValue(':username', $username, SQLITE3_TEXT);
$statement->bindValue(':password', $password, SQLITE3_TEXT);
$result = $statement->execute();

if ($result->fetchArray(SQLITE3_ASSOC)) {
    // Учетные данные верны, установка сеанса пользователя
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    // Закрытие соединения с базой данных
    $db->close();

    // Перенаправление пользователя на страницу после входа
    header('Location: dashboard.php');
    exit();
} else {
    // Учетные данные неверны
    $db->close();
    echo 'Invalid username or password.';
}
?>
