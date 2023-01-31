<?php 

function ajax_echo(
    $title = '',
    $text = '',
    $error = false,
    $type = 'ERROR',
    $other = null
    ){
    return json_encode(array(
        "error" => $error,
        "type" => $type,
        "title" => $title,
        "desc" => $text,
        "other" => $other,
        "datetime" => array(
            'Y' => date('Y'),
            'm' => date('m'),
            'd' => date('d'),
            'H' => date('H'),
            'i' => date('i'),
            's' => date('s'),
            'full' => date('Y-m-d H:i:s'),
        )
    ));
}

function update()
{
    // запрос для обновления записи (товара)
    $query = "UPDATE
            " . $this->table_name . "
        SET
            name = :name,
            price = :price,
            product_id = :product_id,
            user_id = :user_id,
            first_name = :first_name,
            second_name = :second_name,
            middle_name = :middle_name,
            gender = :gender,
            date_of_birth = :date_of_birth
        WHERE
            id = :id";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // очистка
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->product_id = htmlspecialchars(strip_tags($this->product_id));
    $this->user_id = htmlspecialchars(strip_tags($this->user_id));
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->first_name = htmlspecialchars(strip_tags($this->first_name));
    $this->second_name = htmlspecialchars(strip_tags($this->second_name));
    $this->middle_name = htmlspecialchars(strip_tags($this->middle_name));
    $this->gender = htmlspecialchars(strip_tags($this->gender));
    $this->date_of_birth = htmlspecialchars(strip_tags($this->date_of_birth));

    // привязываем значения
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":product_id", $this->product_id);
    $stmt->bindParam(":user_id", $this->user_id);
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":first_name", $this->first_name);
    $stmt->bindParam(":second_name", $this->second_name);
    $stmt->bindParam(":middle_name", $this->middle_name);
    $stmt->bindParam(":gender", $this->gender);
    $stmt->bindParam(":date_of_birth", $this->date_of_birth);

    // выполняем запрос
    if ($stmt->execute()) {
        return true;
    }
    return false;
}