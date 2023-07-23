<?php
$mail = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$backUpPhone = $_POST['backUpPhone'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$fathersName = $_POST['fathersName'];
$dayOfBirth = $_POST['dayOfBirth'];
$monthOfBirth = $_POST['monthOfBirth'];
$yearOfBirth = $_POST['yearOfBirth'];
$gender = $_POST['gender'];
$error='';

if (trim($mail) == '') 
{
	$error = 'введите E-mail';
}
elseif (trim($phoneNumber) == '') 
{
	$error = 'введите ваш номер телефона';
}
elseif (trim($surname) == '') 
{
	$error = 'введите вашу фамилию';
}
elseif (strlen($surname) < 2 && strlen($surname) > 40) 
{
	$error = 'Фамилия должна быть от 2 до 40 символов длинной';
}
elseif (trim($name) == '') 
{
	$error = 'введите ваше имя';
}
elseif (strlen($name) < 2 && strlen($name) > 20) 
{
	$error = 'Имя должно быть от 2 до 20 символов длинной';
}

if ($error != '') 
{
	echo $error;
	exit;
}

$message="Почта: {$mail};\r\nНомер телефона: {$phoneNumber};
Дополнительный номер: {$backUpPhone};\r\nФамилия: {$surname};\r\nИмя: {$name};
Отчество: {$fathersName};\r\nДень рождения: {$dayOfBirth};
Месяц рождения: {$monthOfBirth};\r\nГод рождения: {$yearOfBirth};
Пол: {$gender}\r\n";
$subject = 'Test';
$headers = "From: example@mail.ru\r\nReply-to: example@mail.ru
Content-type: text/html;charset=utf-8\r\n";

mail($mail, $subject, $message, $headers);

header('Location: /');