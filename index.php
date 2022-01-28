<?php include "includes/header.php";
?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Header Section -->
    <div class="_header_wrapper">
        <div class="_header_overlay"></div>
        <div class="_header_wrap">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="_header_content_wrap">
                            <div class="_header_content_heading">
                                <h1 class="_header_content_title">
                                    Welcome to Islamfeed!
                                </h1>
                                <p class="_header_content_heading_txt">
                                    The place to find all the information about islamic scholars.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 mx-auto">
                         <?php include "includes/sidebar.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Section -->
    <!-- Page Content -->
    <div class="_post_wrapper">
        <div class="_post_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 lg-11 col-md-12 col-sm-12 mx-auto">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="_post_heading">
                                    <h2 class="_post_heading_title">Scholars</h2>                        
                                </div>
                            </div>
                        </div>
                        <div class="row post-container" id="#post_category">
                
                            
                            <form method="POST" action="?page=1#post_category"
                           >
                                <div class="form-group">
                                <select name="post_category" id="post_category" onchange="this.form.submit()">
                                    <?php
                                        $selected = '';
                                        if(isset($_POST["post_category"])){
                                            $selected = $_POST["post_category"];
                                        }
                                        $query = "SELECT * FROM category"; 
                                        $update_categories = mysqli_query($connection,$query);
                                        if($selected==''){
                                            echo "<option value='' selected>All</option>";
                                        }
                                        else
                                        echo "<option value=''>All</option>";
                                        // querycheck($update_categories);
                                        while($row = mysqli_fetch_assoc($update_categories)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            if($selected==$cat_id){
                                                echo "<option value='$cat_id' selected>{$cat_title}</option>";
                                            }
                                            else{
                                                echo "<option value='$cat_id'>{$cat_title}</option>";

                                            }

                                            
                                        }
                                    ?>


                                </select>
                            </div>
                         </form>
                        
   


                            <?php
                            // code for pagination 
                              if(isset($_GET["page"])){
                                $page_no =$_GET["page"];
                              }
                              else if(isset($_POST["page"])){
                                $page_no =$_POST["page"];
                              }
                              else{
                                $page_no =1;
                              }
                            $page_size = 6;
                            $offset = ($page_no-1) *  $page_size;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $post_cat ='';
                            $query1 = "SELECT COUNT(post_id) FROM posts where post_status='published'";
                            if(isset($_POST["post_category"]) && $_POST["post_category"]!=''){
                                $query1 .= " and post_category_id =".$_POST["post_category"];
                                $post_cat = $_POST["post_category"];
                            }
                           else if(isset($_GET["post_category"]) && $_GET["post_category"]!=''){
                                $query1 .= " and  post_category_id =".$_GET["post_category"];
                                $post_cat = $_GET["post_category"];
                            }
                            

                            $result_db = mysqli_query($connection, $query1);
                            if(!empty($result_db)){
                                $row_db = mysqli_fetch_row($result_db);  
                                $total_records = $row_db[0]; 
                            }
                            else $total_records =0;
                            // print_r($total_records );
                            $total_pages = ceil($total_records /  $page_size ); 

                              // code for pagination 

                            // Feathing data from database 
                            
                            $query = "SELECT * FROM posts where post_status='published'";

                            if(isset($_POST["post_category"]) && $_POST["post_category"]!=''){
                                $query .= " and post_category_id =".$_POST["post_category"];
                            }
                            $query .=" LIMIT ".$offset.",".$page_size ;
                            // print_r($query );
                            $select_all_posts = mysqli_query($connection, $query);
                
                            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'], 0, 300);
                                $post_status = $row['post_status'];
                                $post_summary = $row['post_summary'];
                                $birth_place = $row['birth_place'];
                                
                                $born = $row['born'];
                
                                if ($post_status == 'published') {
                
                
                
                            ?>
                
                
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
                            
                            $pagLink = "<ul class='pagination _pagination_wrap'>";  
                            for ($i=1; $i<=$total_pages; $i++) {
                                        $pagLink .= "<li id='$i' class='page-item'><a class='page-link' href='?page=".$i."&post_category=".$post_cat."#post_category"."'>".$i."</a></li>";	
                            }
                            echo $pagLink . "</ul>"; 
                            ?>

                            <script>
                              document.getElementById(<?php echo $page_no; ?>).className ="active";
                            </script>

                

                                 
                        
                
                            <!-- Blog Sidebar Widgets Column -->
                
                
                
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        
        
        
                
                <!-- Footer -->
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