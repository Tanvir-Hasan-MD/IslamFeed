<?php
    if(isset($_POST['create_user'])){
        
        $user_firstname= $_POST['user_fname'];
        $user_lastname= $_POST['user_lname'];
        $user_role= $_POST['user_role'];
        $username= $_POST['username'];
        $user_email= $_POST['user_email'];
        $user_password= $_POST['user_password'];
        

    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,
              user_email,user_password) VALUES('{$user_firstname}',
              '{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
        $create_user_query = mysqli_query($connection,$query);

        querycheck($create_user_query);
        echo "User Created: "." " . "<a href='users.php'>View all users</a>";


    }
?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" class="form-control" name="user_fname">
    </div>
    <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" class="form-control" name="user_lname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="Admin">Select options</option>
            <option value="admin">Admin</option>
            <option value="moderator">Moderator</option>
      

        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image"> 
    </div> -->

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_passowrd">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
    </div>

</form>