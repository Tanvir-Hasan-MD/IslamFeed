
<form action="" method="POST">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        
        <?php
            if(isset($_GET['edit'])){
                $edit_cat_id = $_GET['edit'];
                
                $query = "SELECT * FROM category WHERE cat_id = $edit_cat_id"; // query for editing categories 
                $edit_categories = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($edit_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
        ?>
            <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title">

            <?php }} ?>

            <?php //update query
                if(isset($_POST['update_category'])){
                $update_cat_title = $_POST['cat_title']; 
                $query = "UPDATE category SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection,$query);
                if(!$update_query){
                    die("update query failed" . mysqli_error($connection));
                }
                }

            ?>

    <input type="text" class="form-control" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category"> 
    </div>
</form>