<?php
session_start(["use_strict_mode" => true]);


if (isset($_POST["login"]) and $_POST["login"]!='')
{
    try {
        $sql = 'SELECT id, name, password, is_admin FROM users WHERE email=(:login)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->execute();
        //$_SESSION['msg'] = "Вы успешно вошли в систему";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка аутентификации: " . $error->getMessage();
        header('Location: /index.php?page=login');
        exit( );
    }
    // если удалось получить строку с паролем из БД

    if ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        if (MD5($_POST["password"]) != $row['password'])
        {
            $_SESSION['msg'] =  "Неправильный пароль!";
            header('Location: /index.php?page=login');
            exit( );
        }
        else {
            // успешная аутентификация
//                    var_dump($row);
            $_SESSION['login'] = $_POST["login"];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['msg'] = "Вы успешно вошли в систему";
            header('Location: /index.php?page=catalog');
            exit( );
        }
    }
    else  {
        $_SESSION['msg'] = "Неправильное имя пользователя!";
        header('Location: /index.php?page=login');
        exit( );
    }



}

if (isset($_GET["logout"]))
{
    session_unset();
    $_SESSION = null;
    $_SESSION['msg'] =  "Вы успешно вышли из системы";
    header('Location: /index.php?page=login');
    exit( );
}


?>