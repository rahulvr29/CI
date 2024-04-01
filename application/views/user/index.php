<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles if needed */
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="container p-3">
            <h2 class='text-center mb-5'>CodeIgniter Crud User Deatils</h2>
            <a class="btn btn-primary mt-4 mb-2" href="<?php echo base_url('index.php/user/create'); ?>">Add User</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['age']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('index.php/user/edit/' . $user['id']); ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/user/delete/' . $user['id']); ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
