<?php
    $dsn = 'mysql:host=localhost;dbname=jjs_recipes';
    $username = 'recipes_user';
    $password = 'kHfKHzai3V6HjNVZ';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }
?>