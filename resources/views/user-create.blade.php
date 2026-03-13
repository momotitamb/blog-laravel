<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Создать пользователя</title>
</head>
<body>
    <h1>Создать пользователя</h1>
    <form method="POST" action="/users">
        @csrf
        
        <label>Имя:</label>
        <input type="text" name="name" required>    
    
        <label>Email:</label>
        <input type="email" name="email" required>    
    
        <label>Пароль:</label>
        <input type="password" name="password" autocomplete="new-password" required>
        
        <button type="submit">Создать</button>
    </form>
</body>
</html>