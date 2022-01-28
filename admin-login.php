<?php include "includes/header.php";
?>

<body>
<?php  include "includes/navigation.php"; ?>
<!-- Login -->
<div class="_login_wrapper">
    <div class="_login_wrap">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-xl-6 col-lg-6 col-md-11 col-sm-12 mx-auto">
                    <div class="_login_content_wrap">
                        <div class="_login_content">
                            <h4 class="_login_content_title">Admin Login</h4>
                            <form action="includes/login.php" method="POST">
                                <!--search form-->
                                <div class="form-group ">
                                    <input name="username" type="text" class="form-control _login_input" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control _login_input" placeholder="Enter Password">
                                </div>
                                <button class="btn btn-primary _login_btn" name="login" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Login -->


    <!-- <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
            
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive"  width="300" height="200" style="border-radius: 15px 50px 30px;" src="images/<?php echo $post_image; ?>" alt="">
            </a>
                
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->