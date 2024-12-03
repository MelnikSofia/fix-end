<?php
session_start(); 

if (!isset($_SESSION['user_data'])) {
    header("Location: forma_log.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевод песен</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;}
            input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        </style>
</head>
<body>
    <h1>Вы можете ввести текст песни Ленинград тут!</h1>
    <form action="submit.php" method="post"> 
        <label for="user_text">Ваш текст:</label><br>
        <textarea id="user_text" name="user_text" required></textarea><br><br>

        <input type="submit" value="Получить исправленный текст песни!">
        
    </form>
</body>
</html>

