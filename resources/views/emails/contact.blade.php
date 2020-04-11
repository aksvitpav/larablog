<!DOCTYPE html>
<html>

<head>
    <title>Larablog</title>
</head>

<body>
    <p>Имя пользователя: {{ $details['name'] }}</p>
    <p>E-mail пользователя: {{ $details['email'] }}</p>
    <p>Сообщение: {{ $details['text'] }}</p>
</body>

</html>