<?php include"includes/admin_header.php";?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $profile_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }
?>

<body>

    <?php
        if(isset($_POST['edit_user'])){
        
            $user_firstname= $_POST['user_fname'];
            $user_lastname= $_POST['user_lname'];
            $user_role= $_POST['user_role'];
            $username= $_POST['username'];
            $user_email= $_POST['user_email'];
            $user_password= $_POST['user_password'];
            
    
            $query = "UPDATE users SET 
            user_firstname='{$user_firstname}',
            user_lastname='{$user_lastname}',
            user_role='{$user_role}',
            user_email='{$user_email}',
            user_password='{$user_password}' 
            WHERE username = '{$username}' ";
            
            $update_user_query = mysqli_query($connection,$query);
           
    
    
        }
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administration
                            <small>Customize your profile</small>
                        </h1>

                        
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

                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
                    </div>
                    <div class="form-group">
                        <label for="user_passowrd">Password</label>
                        <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                    </div>

                    </form>

                       

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php";?>

    