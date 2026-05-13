<?php session_start(); ?>
<?php
include "config.php";
$query = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>CRUD | Ayush</title>
   <link rel="stylesheet" href="style.css" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

   <div class="container">
      <h1>User List</h1>
      <a href="add.php">Add User</a>

      <table>
         <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
         </tr>

         <?php
         $no = 1;
         while ($user = mysqli_fetch_assoc($query)) : ?>

         <tr>
            <td><?= $no++ ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['phone'] ?></td>
            <td><?= $user['address'] ?></td>
            <td>
               <a href="edit.php?id=<?= $user['id'] ?>">Edit</a>
               <a href="action.php?id=<?= $user['id'] ?>" class="btn-delete" onclick="confirmDelete(event, <?= $user['id'] ?>)">Delete</a>
            </td>
         </tr>
         <?php endwhile; ?>
      </table>
   </div>

   <?php if (isset($_GET['success'])) { ?>
   <script>
   Swal.fire({
      title: 'Success!',
      text: 'User added successfully!',
      icon: 'success',
      confirmButtonText: 'OK'
   });
   </script>
   <?php } ?>

   <?php if (isset($_GET['updated'])) { ?>
   <script>
   Swal.fire({
      title: 'Updated!',
      text: 'User updated successfully!',
      icon: 'success',
      confirmButtonText: 'OK'
   });
   </script>
   <?php } ?>

   <?php if (isset($_SESSION['status'])) { ?>
<script>
Swal.fire({
    title: "<?php echo $_SESSION['status_code'] == 'success' ? 'Success!' : 'Error!'; ?>",
    text: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    confirmButtonText: 'OK'
});
</script>
<?php 
unset($_SESSION['status']);
unset($_SESSION['status_code']);
} ?>

</body>

</html>