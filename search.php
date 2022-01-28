<?php include"includes/header.php"; 
?>

<body>

    <!-- Navigation -->
   <?php include"includes/navigation.php";?>

   <div class="_search_page_wrapper">
    <div class="_search_page_wrap">
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-11 col-md-12 col-sm-12 mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                        <h4 class="_search_title">Search</h4>
                            <?php include"includes/sidebar.php";?> 
                        </div>
                    </div>    
                <div class="row">
                        <!-- Blog Entries Column -->
                            <?php
                                if(isset($_POST['submit'])){
                                    $search = $_POST['search'];
                                    $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                                    $search_query = mysqli_query($connection,$query);
                                    if(!$search_query){
                                        die("search query failed". mysqli_error($connection));
                                    }
                                    $count = mysqli_num_rows($search_query);
                                    if($count == 0){
                                        echo "<h2>No results found</h2>";
                                    }else{
                                         
                                        while($row = mysqli_fetch_assoc($search_query)){
                                            $post_id = $row['post_id'];
                                            $post_title = $row['post_title'];
                                            $post_author = $row['post_author'];
                                            $post_date = $row['post_date'];
                                            $post_image = $row['post_image'];
                                            $post_content = $row['post_content'];
                                            $post_summary = $row['post_summary'];
                                            $born = $row['born'];
                    
                                    ?>
                                         <!-- <h1 class="page-header">
                                        Page Heading
                                        <small>Secondary Text</small>
                                    </h1> -->
                    
                                    <!-- First Blog Post -->

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="post-card">
                                            <div class="_post_card_img_wrap">
                                                <a alt='Post Cover Image' href="post.php?p_id=<?php echo $post_id;?>">
                                                    <img class="card-img-top" src="images/<?php echo $post_image; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="card-body _post_body ">
                                                <h3 class="card-title _post_title"> <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h3>
                                                <p class="lead card-text">
                                                    Place: <span> <?php echo $birth_place ?> </span>
                                                </p>
                                                <!-- <p><span class="glyphicon glyphicon-time"></span> Posted on <?php // echo $post_date ?></p> -->
                
                                                <p class="card-text"><?php echo $born ?></p>
                                                <p class="card-text _post_summary_txt"><?php echo $post_summary ?></p>
                                                <div class="_post_footer">
                                                    <a class="btn btn-dark" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
             
                                    }
                                }
                                ?>
             
                        <!-- Blog Sidebar Widgets Column -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container">
    <hr>          
    <!-- Footer -->
    <?php   include"includes/footer.php";?>

</div>
