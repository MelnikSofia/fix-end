<?php
session_start();

if (!isset($_SESSION['user_data'])) {
    header("Location: forma_log.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstName = $_SESSION['user_data']['first_name'];
    $lastName = $_SESSION['user_data']['last_name'];
    $originalText = $_POST['original_text'];
    $filteredText = $_POST['filtered_text']; 

    $date = date('Y-m-d H:i:s');

    $record = "Дата: $date, Имя: $firstName, Фамилия: $lastName, Оригинальный текст: $originalText, Отфильтрованный текст: $filteredText
";

    file_put_contents('records.txt', $record, FILE_APPEND | LOCK_EX);
    unset($_SESSION['user_data']);

    
    echo "Данные успешно сохранены!";
} else {
    echo "Данные не были отправлены.";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сохранение записи в файл</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            curs
            or: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
<form action="forma_input_text.php" method="post">
    <input type="submit" value="Поробовать еще раз">
</form>
</body>
</html>
