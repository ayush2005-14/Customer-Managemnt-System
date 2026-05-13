<?php

include "config.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn, "INSERT INTO users (name, email, phone, address)
        VALUES ('$name', '$email', '$phone', '$address')");

    // yaha change kiya
    header("Location: index.php?success=1");
    exit;
}


// if (isset($_POST['add'])) {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];

//     mysqli_query($conn, "INSERT INTO users (name, email, phone, address)
//         VALUES ('$name', '$email', '$phone', '$address')");

//     header("Location: index.php");
//     exit;
// }

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mysqli_query($conn, "UPDATE users
    SET name='$name', email='$email', phone='$phone', address='$address'
    WHERE id=$id");

    header("Location: index.php?updated=1");
    exit;
}

// if (isset($_POST['update'])) {
//     $id = $_GET['id'];
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];

//     mysqli_query($conn, "UPDATE users
//     SET name='$name', email='$email', phone='$phone', address='$address'
//     WHERE id=$id");

//     header("Location: index.php");
//     exit;
// }


session_start();

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

    if ($query) {
        $_SESSION['status'] = "User deleted successfully!";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Delete failed!";
        $_SESSION['status_code'] = "error";
    }

    header("Location: index.php");
    exit;
}

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];

//     mysqli_query($conn, "DELETE FROM users WHERE id=$id");
//     header("Location: index.php");
//     exit;
// }