
<?php  include "includes/header.php"; ?>
<?php  include "includes/navigation.php"; ?>

    <?php
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!empty($username) && !empty($email) && !empty($password)){
            
                $username = mysqli_real_escape_string($connection,$username);
                $email = mysqli_real_escape_string($connection,$email);
                $password = mysqli_real_escape_string($connection,$password);

                $hash_format = "$2y$10$";
                $salt = "qwertyasdfmnbvikmnjuyh";
                $encryption = $hash_format . $salt;
                $password = crypt($password,$encryption);
                
                $query = "INSERT INTO users (username, user_email, user_password, user_role) VALUES ('{$username}',
                        '{$email}', '$password', 'Moderator')";
                $registration_query = mysqli_query($connection,$query);
                $text = "Your registration has been submitted";
                if(!$registration_query){
                    die("Query Failed" . mysqli_error($connection));
                }
            }
            else{
                $text = "!! Some fields are empty !!";
            }
        }
        else{
            $text="";
        }


    ?>  
    
 
    <!-- Page Content -->
    <div class="_register_wrapper">
        <div class="_register_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h4 class="_search_title">Registration</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mx-auto">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-wrap">
                                <h1>Register</h1>
                                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                        <h5 class="text-center"><?php echo $text ?> </h5>
                                        <div class="form-group my-2">
                                            <label for="username" class="sr-only">username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                        </div>
                                         <div class="form-group my-2">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                        </div>
                                         <div class="form-group my-2">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                        </div>
                                        
                                
                                        <input type="submit" name="submit" id="btn-login" class="btn btn-dark mt-2 mx-auto d-block" value="Register">
                                    </form>
                                 
                                </div>
                            </div> <!-- /.col-xs-12 -->
                        </div> <!-- /.row -->
                    </div>
                </div>
            </div> <!-- /.container -->
        </div>
    </div>

    <div class="container">
        <hr>
        <?php include "includes/footer.php";?>
    </div>



