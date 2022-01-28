<?php
   function querycheck($result){
       global $connection;
       if(!$result){
        die("Post Category Query Failed" . mysqli_error($connection));
    }

   }
   
   function insert_categories(){ 
       global $connection;
       
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty('cat_title')){
            echo "<h2> This field should not be empty</h2>";
        }else{
            $query = "INSERT INTO category(cat_title) VALUE('{$cat_title}') ";
            $create_category_qeury = mysqli_query($connection,$query);
 
        if(!$create_category_qeury){
            die('Query failed' . mysqli_error($connection));
                }
            }
        }
    }

    function findallcategories(){
        global $connection;

        $query = "SELECT * FROM category"; // qeury for finding categories 
        $select_categories = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_categories)){
              $cat_id = $row['cat_id'];
              $cat_title = $row['cat_title'];
              
              echo "<tr>";
              echo "<td>{$cat_id}</td>";
              echo "<td>{$cat_title}</td>";
              echo "<td><a href='admin_categories.php?delete={$cat_id}'>Delete</a></td>";
              echo "<td><a href='admin_categories.php?edit={$cat_id}'>Edit</a></td>";
              echo "</tr>";
          }
    }

    function delete_categories(){
        global $connection;

        if(isset($_GET['delete'])){
            $delete_cat_id = $_GET['delete']; 
            $query = "DELETE FROM category WHERE cat_id = {$delete_cat_id}";
            $delete_query = mysqli_query($connection,$query);
            header("Location:admin_categories.php"); 
        }

    }

?>