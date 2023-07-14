
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="registr.php" class="form__success">
        <h1 class="title__success">Sowwy</h1>
        <h1 class="title">&#9786</h1>
        <a type="submit" class="fail-btn" href="index.html">Try Again</a>
    </form>
</body>
</html>
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
}
?>
