<?php


todoName = htmlspecialchars($_POST['todo']);
$todoName = trim($todoName);
$jsonArray = [];

//Если файл существует - получаем его содержимое
if (file_exists('todo.json')){
$json = file_get_contents('todo.json');
$jsonArray = json_decode($json, true);
}
// Делаем запись в файл
if ($todoName){
$jsonArray[] = $todoName;
file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
header('Location: '. $_SERVER['HTTP_REFERER']);

}

// Удаление записи
$key = @$_POST['todo_name'];
if (isset($_POST['del'])){
unset($jsonArray[$key]);
file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
header('Location: '. $_SERVER['HTTP_REFERER']);

}

// Редактирование
if (isset($_POST['save'])){
$jsonArray[$key] = @$_POST['title'];
file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <form action="/users/register" method="post">
    <link rel="stylesheet" href="style.css">
    <title>Форма регистрации</title>
</head>
<body>
<main>
    <form action="register.php" method="post"></form>
    <div class="circle"></div>
    <div class="register-form-container">
        <h1 class="form-title">
            Регистрация
        </h1>
        <div class="form-fields">
            <div class="form-field">
                 <input type="text" placeholder="login">
            </div>
        <div class="form-field">
                 <input type="text" placeholder="password">
        </div>
        <div class="form-field">
                 <input type="text" placeholder="confirm_password">
        </div>
        <div class="form-field">
                 <input type="text" placeholder="email">
        </div>
        <div class="form-field">
                 <input type="text" placeholder="name">
        </div>
        </div>
        <div class="form-buttons">
            <a href="#" class="button">Регистрация</a>
            <div class="divider">Или</div>
            <a href="#" class="button button-авторизация">Авторизация</a>

    </div>
        </form>
</main>
</body>
</html>