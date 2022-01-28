<?php

    if(isset($_GET['edit_user'])){
        $edit_userid = $_GET['edit_user'];

        $query = "SELECT * FROM users WHERE user_id = $edit_userid";
        $update_users = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($update_users)){
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];
                }
    }

    if(isset($_POST['edit_user'])){
        
        $user_firstname= $_POST['user_fname'];
        $user_lastname= $_POST['user_lname'];
        $user_role= $_POST['user_role'];
        $username= $_POST['username'];
        $user_email= $_POST['user_email'];
        $user_password= $_POST['user_password'];


            $hash_format = "$2y$10$";
            $salt = "qwertyasdfmnbvikmnjuyh";
            $encryption = $hash_format . $salt;
            $password = crypt($user_password,$encryption);
        

        $query = "UPDATE users SET 
        user_firstname='{$user_firstname}',
        user_lastname='{$user_lastname}',
        user_role='{$user_role}',
        username='{$username}',
        user_email='{$user_email}',
        user_password='{$password}' 
        WHERE user_id = {$edit_userid}";
        
        $update_user_query = mysqli_query($connection,$query);
       


    }
?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_fname">First Name</label>
        <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_fname">
    </div>
    <div class="form-group">
        <label for="user_lname">Last Name</label>
        <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value=""><?php echo $user_role; ?></option>
            <?php 
            if($user_role == 'Admin'){
                echo "<option value='Moderator'>Moderator</option>";
            }else{
            echo "<option value='Admin'>Admin</option>";
            }
            ?>
            
        </select>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username?>" class="form-control" name="username">
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image"> 
    </div> -->

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_passowrd">Password</label>
        <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
    </div>

</form>