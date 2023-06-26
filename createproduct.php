<?php
require ('dbconnect.php');
require ('auth.php');
if (!$_SESSION['is_admin']) {
    $_SESSION['msg'] = "У вас нет прав на добавление товара!";
    header('Location: /index.php');
    exit();
}

try {
    for($i=0; $i<count($_FILES['picture']['tmp_name']); $i++)
    {
        $file = fopen($_FILES['picture']['tmp_name'][$i], 'r+');
        $target_dir = "img/";
        //получение расширения
        $ext = explode('.', $_FILES["picture"]["name"][$i]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;
        echo $filename;
        move_uploaded_file($_FILES["picture"]["tmp_name"][$i], $target_dir . $filename);

    }

    $sql = 'INSERT INTO products (name, description, price, image_url)  VALUES (:name, :description, :price, :img_url)';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->bindValue(':price', $_POST['price']);
    $stmt->bindValue(':img_url', 'img/'.$filename);
    echo ($stmt->queryString);
    $stmt->execute();
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка добавления товара: " . $error->getMessage();
}

header('Location: /index.php?page=catalog');
exit( );