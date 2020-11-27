<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>4 Работа</title>
</head>
<body>
    <?php
        $file_user = fopen("user.dat","r");
        $lines = array();
        while(!feof($file_user))  {
            $result = fgets($file_user);
            array_push($lines, $result);
        }
        fclose($file_user);
    ?>
    <?php if (!isset($_POST['submit']) || md5($_POST['login']) !== trim($lines[0]) || md5($_POST['password']) !== trim($lines[1]) ) { ?>
        <form method="post">
            <p>Логин: <input type="text" name="login" /></p>
            <p>Пароль: <input type="password" name="password" /></p>
            <p><input type="submit" name="submit"/></p>
        </form>
    <?php }?>

    <?php 
        if(isset($_POST['submit']))  {
            if (md5($_POST['login']) === trim($lines[0]) && md5($_POST['password']) === trim($lines[1]) ){
                echo "<p>Вы залогинены!!!</p>";
            } else {
                echo "<p>Ошибка! Неправильно введен логин и/или пароль!</p>";
            }
        }
    ?>
</body>
</html>