<?php

function query($query) {
    global $conn; 
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function update($table, $data, $where) {
    global $conn;
    $query = "UPDATE $table SET ";
    $set_clause = "";
    foreach ($data as $field => $value) {
        $set_clause .= "$field = '" . mysqli_real_escape_string($conn, $value) . "', ";
    }
    $query .= rtrim($set_clause, ', ');
    $query .= " WHERE $where";
    $result = mysqli_query($conn, $query);
    return $result;
}

function update_user($id, $name, $role, $photo = null) {
    global $conn;
    $data = [
        'fullname' => $name,
        'role' => $role,
    ];
    if ($photo) {
        $photo_name = basename($photo['name']);
        $target_path = "./image/user-picture/" . $photo_name;
        if (move_uploaded_file($photo['tmp_name'], $target_path)) {
            $data['photo'] = $photo_name;
        } else {
            die('File Upload Error: ' . print_r(error_get_last(), true));

        }
    }
    $where = "id = '" . mysqli_real_escape_string($conn, $id) . "'";
    $result = update('users', $data, $where);
    return $result;
}

