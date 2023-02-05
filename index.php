<?php 

include_once("config.php");
include_once("err_handler.php");
include_once("db_connect.php");
include_once("functions.php");
include_once("find_token.php");

if(!isset($_GET['type'])) {
    echo ajax_echo(
        "Ошибка!", // Заголовок ответа
        "Вы не указали GET параметр type", // Описание ответа
        true, // Наличие ошибка
        "ERROR", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

if(preg_match_all("/^(list_product)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `name`, `price` FROM `product`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список продукции", // Заголовок ответа
        "Вывод списка продуктов", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_users)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `first_name`, `second_name`, `middle_name`, `gender`, `date_of_birth` FROM `users`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список продукции", // Заголовок ответа
        "Вывод списка пользователей", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_comments)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `product_id`, `user_id`, `comment`, `date_of_append` FROM `comments`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список продукции", // Заголовок ответа
        "Вывод списка комментариев", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_purchased_product)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `product_id`, `user_id`, `date_of_append` FROM `purchased product`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список продукции", // Заголовок ответа
        "Вывод списка проданной продукции", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}

if(preg_match_all("/^(list_clients_api)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `token`, `date_of_created` FROM `clients_api`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список продукции", // Заголовок ответа
        "Вывод списка токенов", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );

    exit();
}












else if(preg_match_all("/^(add_product)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "INSERT INTO `product`(`name`, `price`) VALUES ('" . $_GET['name'] . "', '". $_GET['price'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый товар был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(add_purchased_product)$/ui", $_GET['type'])){
    if(!isset($_GET['product_id'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр product_id", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['user_id'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр user_id", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "INSERT INTO `purchased product`(`product_id`, `user_id`) VALUES ('" . $_GET['product_id'] . "', '". $_GET['user_id'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый проданый товар был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(add_users)$/ui", $_GET['type'])){
    if(!isset($_GET['first_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр first_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['second_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр second_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['middle_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр middle_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['gender'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр gender", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "INSERT INTO `users`(
        `first_name`, 
        `second_name`, 
        `middle_name`, 
        `gender`) VALUES (
            '" . $_GET['first_name'] . "',
             '". $_GET['second_name'] ."',
             '". $_GET['middle_name'] ."',
             '". $_GET['gender'] ."'
             )";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Новый пользователь был добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}












else if(preg_match_all("/^(upd_product)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `product` SET `name` = '". $_GET['name'] ."', `price` = '". $_GET['price'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление товара прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_users)$/ui", $_GET['type'])){
    if(!isset($_GET['first_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр first_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['second_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр second_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['middle_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр middle_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['gender'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр gender", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `users` SET 
        `first_name` = '". $_GET['first_name'] ."', 
        `second_name` = '". $_GET['second_name'] ."',
        `middle_name` = '". $_GET['middle_name'] ."',
        `gender` = '". $_GET['gender'] ."'
        WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление информации пользователя прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_comments)$/ui", $_GET['type'])){
    if(!isset($_GET['comment'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр comment", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `comments` SET `comment` = '". $_GET['comment'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех", // Заголовок ответа
        "Обновление комментария прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}


//шаблон функции
echo ajax_echo(
    "Заголовок", // Заголовок ответа
    "текст", // Описание ответа
    false, // Наличие ошибка
    "SUCCESS", // Результат ответа
    array( 
        0,1,2,3,4,5,6
    ) // Дополнительные данные для ответа
);