<?php
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Edit User</h1>
            <form method="POST" action="action.php?id=<?= $id ?>">
                <input type="text" name="name" placeholder="Name" value="<?= $user['name'] ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" required>
                <input type="text" name="phone" placeholder="Phone" value="<?= $user['phone'] ?>" required>
                <textarea name="address" placeholder="Address" required><?= $user['address'] ?></textarea>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update</button>
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>