<?php
session_start();

function validation_name(string $firstName, string $lastName)
{
    if (preg_match('/^[а-яА-ЯёЁ\s]+$/u', $firstName) && preg_match('/^[а-яА-ЯёЁ\s]+$/u', $lastName) && !empty($firstName) && !empty($lastName)) {
        return true;
    } else {
        return 'Введите имя и фамилию корректно';
    }
}

function validation_date(string $dateString)
{
    $date = DateTime::createFromFormat('Y-m-d', $dateString);
    if ($date && $date->format('Y-m-d') === $dateString && !empty($dateString)) {
        return true;
    } else {
        return 'Введите дату рождения корректно';
    }
}


$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$dateBirthString = $_POST['data_birthday'] ?? '';

$errorMessages = []; // Массив для ошибок


if (empty($firstName) || empty($lastName) || empty($dateBirthString)) {
    $errorMessages[] = 'Пожалуйста, заполните все поля.';
} else {
    
    $nameError = validation_name($firstName, $lastName);
    if ($nameError !== true) {
        $errorMessages[] = $nameError;
    }

    $dateError = validation_date($dateBirthString);
    if ($dateError !== true) {
        $errorMessages[] = $dateError;
    }
}


if (!empty($errorMessages)) {
    $errorString = implode(', ', $errorMessages);
    header("Location: forma_log.php?error=" . urlencode($errorString));
    exit();
}


$dateBirth = new DateTime($dateBirthString);
$now_year = new DateTime();
$age = $now_year->diff($dateBirth)->y;

if ($age < 16 || $age > 100) {
    header("Location: forma_log.php?error=Вы не достигли допустимого возраста.");
    exit();
} else {
    $_SESSION['user_data'] = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'date_of_birth' => $dateBirthString
    ];
    header("Location: forma_input_text.php");
    exit();
}
