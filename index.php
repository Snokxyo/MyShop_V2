<?php
require('dbconnect.php');
require('auth.php');
require('components/header.php');

switch ($_GET['page']) {
    case "catalog":
    {
        require "components/products_list.php";
        break;
    }

    case "product":
    {
        require "components/product_info.php";
        break;
    }
    case "login":
    {
        require "components/login_form.php";
        break;
    }
    case "productform":
    {
        if ($_SESSION['is_admin']) {
            require "components/product_form.php";
            break;
        }
        else
        {
            $_SESSION['msg'] = "У вас нет доступа к этой странице!";
            header('Location: /index.php');
            exit();
        }
    }
    default:
    {
        require('components/company_info.php');
    }
}
require('components/message.php');
require('components/footer.php');

?>