<?php
// Check if user is logged in
$isLoggedIn = $this->session->userdata('username') ? true : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
        /* Add custom styles if needed */
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="container p-3">
            <h2 class='text-center mb-5'>CodeIgniter Crud User Deatils</h2>

            <div class='d-flex align-items-center justify-content-between'>
                <?php if (!$isLoggedIn): ?>
                    <!-- If user not logged in -->
                    <a class="btn btn-primary mt-4 mb-2" href="<?php echo base_url('index.php/login'); ?>">Login</a>
                <?php else: ?>
                    <!-- If user logged in -->
                    <a class="btn btn-success mt-4 mb-2" href="<?php echo base_url('index.php/user/create'); ?>">Add User <i
                            class="fas fa-plus"></i></a>
                    <a class="btn btn-danger mt-4 mb-2" href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a>
                <?php endif; ?>
            </div>
        </div>
        <table id="userTable" class="table table-striped">
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
                        <td>
                            <?php echo $user['id']; ?>
                        </td>
                        <td>
                            <?php echo $user['username']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td>
                            <?php echo $user['age']; ?>
                        </td>
                        <td>
                            <?php echo $user['gender']; ?>
                        </td>
                        <td>
                            <?php echo $user['password']; ?>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary"
                                href="<?php echo base_url('index.php/user/edit/' . $user['id']); ?>">Edit</a>
                            <a class="btn btn-sm btn-danger"
                                href="<?php echo base_url('index.php/user/delete/' . $user['id']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                "lengthMenu": [[-1, 1, 2, 3, 5,], ["All", 1, 2, 3, 5,]] // Custom entries for number of records per page
            });
        });
    </script>
</body>

</html>