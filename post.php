<?php include "includes/header.php";
   
?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="_single_post_wrapper">
        <div class="_single_post_wrap">
            <div class="container">
        
                <div class="row">
                    <?php
                    
                    
                        if (isset($_GET['p_id'])) {
                            $post_id = $_GET['p_id'];
                        }
                        $query = "SELECT * FROM posts WHERE post_id = $post_id";
                        $select_all_posts = mysqli_query($connection, $query);
                        
                        
                    if(!empty($select_all_posts )){
                        while ($row = mysqli_fetch_assoc($select_all_posts) ) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_summary = $row['post_summary'];
                            $birth_place = $row['birth_place'];
                            $born = $row['born'];

                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="_single_post_left">
                            <div class="_single_post_img_wrap">
                                <img class="post-image" style="" src="images/<?php echo $post_image; ?>" alt="">
                            </div>
                            <div class="_single_post_content">
                                <h3 class="_single_post_content_title"><?php echo $post_title ?></h3>
                                <p class="_single_post_content_txt"><em>Born: <?php echo $born ?> </em> </p>
                                <p class="_single_post_content_txt"><em>Place: <?php echo $birth_place ?> </em> </p>
                            </div>
                            <div class="_single_post_content">
                                <h5 class=""><em>Summary</em></h5>
                                <p class="_single_post_content_txt"><?php echo $post_summary ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

                        <div class="_single_post_right">
                            <h2>
                                <!-- <a href="#"><?php echo $post_title ?></a> -->
                                <!-- Name of Professor -->
                            </h2>
                            <!-- <p class="lead">
                                by <a href="index.php"><?php echo $post_author ?></a>
                            </p> -->
                            <!-- <h4>Designation</h4>
                            <p>Name of Campus</p>
                            <p>Name of Department</p> -->
                            <!-- <hr> -->
                            <div class="_single_post_right_content">
                                <h3 class="_single_post_right_title">Biography</h3>
                                    <?php echo $post_content ?>
                            </div>
                            <!-- <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
    
                            <p> <?php echo $post_content ?></p> -->
                        </div>
    
                    <?php }  } 
                    else{
                  
                    ?>
                    <h1>No result found!</h1>
                    <?php }?>
                        <div class="post-box _comment_box">
                                <!-- First Blog Post -->
                                
                            <!-- Blog Comments -->
            
                            <?php
                                    if (isset($_POST['create_comment'])) {
                                        $comment_post_id = $_GET['p_id'];
                                        $comment_author = $_POST['comment_author'];
                                        $comment_email = $_POST['author_email'];
                                        $comment_content = $_POST['comment_content'];
            
                                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
            
                                            $query = "INSERT INTO comments(comment_post_id, comment_author, author_email, comment_content,
                                        comment_status, comment_date) VALUES($comment_post_id, '{$comment_author}', '{$comment_email}',
                                        '{$comment_content}', 'Unapproved', now())";
            
                                            $create_comment_query = mysqli_query($connection, $query);
                                            $query = "UPDATE posts SET post_comment_count = post_comment_count +1
                                                WHERE post_id = $comment_post_id";
                                            $update_post_commentcount = mysqli_query($connection, $query);
                                        } else {
                                            echo "<script>alert('!! Some Fields Are Empty !!')</script>";
                                        }
                                    }
                                    ?> 
                            <!-- Posted Comments -->
            
                            <?php
            
                                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND
                            comment_status = 'approved' ORDER BY comment_id DESC ";
                                    $post_comment_queryy = mysqli_query($connection, $query);
                                    if (!$post_comment_queryy) {
                                        die("query failed" . mysqli_error($connection));
                                    }
            
                                    while ($row = mysqli_fetch_array($post_comment_queryy)) {
                                        $comment_date = $row['comment_date'];
                                        $comment_author = $row['comment_author'];
                                        $comment_content = $row['comment_content'];
                                    ?>
            
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <!-- <img class="media-object" src="http://placehold.it/64x64" alt=""> -->
                                        <span class="_user_ic">
                                            <i class="far fa-user"></i>
                                        </span>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $comment_author; ?>
                                            <small>Posted On <?php echo $comment_date; ?></small>
                                        </h4>
                                        <?php echo $comment_content; ?>
                                    </div>
                                </div>
            
                            <?php } ?>
                        </div>
                        <!-- Comments Form -->
                        <div class="well">
                            <h3>Leave a Comment:</h3>
                            <form action="" method="POST" role="form">
                                <div class="form-group">
                                    <input placeholder="Name" type="text" class="form-control _search_input my-2" name="comment_author">
                                </div>
                                <div class="form-group">
                                    <input placeholder="Email" type="email" class="form-control _search_input my-2" name="author_email">
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Write your comment here.." class="form-control _search_input my-2" name="comment_content" rows="3"></textarea>
                                </div>
                                <button type="submit" name="create_comment" class="btn btn-dark">Comment</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
                <!-- Blog Sidebar Widgets Column -->
                <?php // include "includes/sidebar.php"; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <hr />

    </div>
    <div class="_footer_wrapper">
        <div class="container">
            <?php include "includes/footer.php"; ?>
        </div>
    </div>