<?php include "includes/database.php"; ?>
<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
      <a class="navbar-brand" href="./index.php">IslamFeed</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php   
            // $query = "SELECT * FROM category";
            // $select_category_query = mysqli_query($connection,$query);
            
            // while($row = mysqli_fetch_assoc($select_category_query)){
                //     $cat_title = $row['cat_title'];
                //     echo "<li><a class='nav-link' href='#'>{$cat_title}</a></li>"; 
                // }
                ?>
        <!-- <li>
            <a class="btn btn-dark" href="/FYYP/admin-login.php">Admin Login</a>
        </li> -->
        <?php
            if(isset($_SESSION['user_role'])){
                echo "
                    <li><a class='nav-link' href='admin/admin_index.php'>Dashboard</a></li>
                    <li><a class='nav-link' href='./includes/logout.php'>Log Out</a></li>
                ";
                if(isset($_GET['p_id'])){
                    $edit_post_id = $_GET['p_id'];
                    echo "<li><a class='nav-link' href='admin/admin_posts.php?source=edit_post&p_id={$edit_post_id}'>Edit</a></li>";
                }
            }
            else{
                echo "
                    <li> <a class='btn btn-dark' href='./registration.php'>Register</a> </li>
                    <li> <a class='btn btn-dark' href='./admin-login.php'>Admin Login</a> </li>
                ";
            }
        ?>
      </ul>
    </div>
  </div>
</nav>

