<?php include "database.php"; ?>
<?php session_start(); ?>

<?php

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($connection,$username);
        $password = mysqli_real_escape_string($connection,$password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $username_query = mysqli_query($connection,$query);

        if(!$username_query){
            die("QueryFailed" . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($username_query)){
            $db_userid = $row['user_id'];
            $db_usename = $row['username'];
            $db_password = $row['user_password'];
            $db_userfname = $row['user_firstname'];
            $db_userlname = $row['user_lastname'];
            $db_userrole = $row['user_role'];
        }
        $password = crypt($password,$db_password);
        
        

        if($username !== $db_usename && $password !== $db_password){
            header("Location:../index.php");
        }elseif($username == $db_usename && $password == $db_password){
            $_SESSION['username'] = $db_usename;
            $_SESSION['user_firstname'] = $db_userfname;
            $_SESSION['user_firstname'] = $db_userlname;
            $_SESSION['user_role'] = $db_userrole;

            header("Location:../admin/admin_index.php");
        }else{
            header("Location:../index.php");
        }

    }
    



?>