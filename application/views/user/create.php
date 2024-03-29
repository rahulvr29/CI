<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles if needed */
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <?php echo form_open('user/store'); ?>
            <div class="form-group">
                <label>Username:</label>
                <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label>Mobile:</label>
                <input class="form-control" type="text" name="mobile">
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input class="form-control" type="text" name="age">
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input class="form-control" type="text" name="gender">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input class="form-control" type="password" name="password">
            </div>
            <button class="btn btn-primary" type="submit">Add User</button>
        <?php echo form_close(); ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
