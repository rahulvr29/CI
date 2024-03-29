<h2>Edit User</h2>
<?php echo form_open('user/update/'.$user['id']); ?>
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
    <label>Mobile:</label><br>
    <input type="text" name="mobile" value="<?php echo $user['mobile']; ?>"><br>
    <label>Age:</label><br>
    <input type="text" name="age" value="<?php echo $user['age']; ?>"><br>
    <label>Gender:</label><br>
    <input type="text" name="gender" value="<?php echo $user['gender']; ?>"><br>
    <label>Password:</label><br>
    <input type="password" name="password" value="<?php echo $user['password']; ?>"><br>
    <button type="submit">Update User</button>
<?php echo form_close(); ?>
