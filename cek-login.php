<?php

require_once('partials/config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    // Fetch user by username
    $stmt = $link->prepare("SELECT * FROM pengguna WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if ($user['password'] == $password) {
            session_start();
            $_SESSION['id_pengguna'] = $user['id_pengguna'];
            $_SESSION['nama_pengguna'] = $user['nama_pengguna'];
            $_SESSION['level'] = $user['level'];

            header('Location: index.php');
        } else {
            header("location:login.php?pass=invalid");
        }
    } else {
        header("location:login.php?username=invalid");
    }

    $stmt->close();
}
?>