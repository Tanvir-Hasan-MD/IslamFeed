<?php
    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_posts_by_id = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)){
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $born = $row['born'];
        $post_summary = $row['post_summary'];
        $achievement = $row['achievement'];
        $birth_place = $row['birth_place'];
    }

    if(isset($_POST['update_post'])){
        $post_category_id= $_POST['post_category'];
        $post_title= $_POST['post_title'];
        $post_author= $_POST['post_author'];
        $post_image= $_FILES['post_image']['name'];
        $post_image_temp= $_FILES['post_image']['tmp_name'];
        $post_content= $_POST['post_content'];
        $post_tags= $_POST['post_tags'];
        $post_status= $_POST['post_status'];
        $born= $_POST['born'];
        $achievement= $_POST['achievement'];
        $post_summary= $_POST['post_summary'];
        $birth_place= $_POST['birth_place'];
        move_uploaded_file($post_image_temp,"../images/$post_image");

        $post_content = mysqli_real_escape_string($connection,$post_content);
        $post_tags = mysqli_real_escape_string($connection,$post_tags);
        $achievement = mysqli_real_escape_string($connection,$achievement);
        $born = mysqli_real_escape_string($connection,$born);
        $birth_place = mysqli_real_escape_string($connection,$birth_place);
        $post_title = mysqli_real_escape_string($connection,$post_title);
        $post_author = mysqli_real_escape_string($connection,$post_author);
        $post_summary = mysqli_real_escape_string($connection,$post_summary);

        $query = "UPDATE posts SET 
                  post_category_id='{$post_category_id}',
                  post_title='{$post_title}',
                  post_author='{$post_author}',
                  post_date=now(),
                  post_image='{$post_image}', 
                  post_content='{$post_content}',
                  post_tags='{$post_tags}', 
                  post_status='{$post_status}',
                  born='{$born}',
                  achievement='{$achievement}',
                  birth_place='{$birth_place}',
                  post_summary='{$post_summary}'
                  WHERE post_id = {$the_post_id}";
        $update_post_query = mysqli_query($connection,$query);
        querycheck($update_post_query);
        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='admin_posts.php'>Edit other posts</a></p>";
    }

?>


<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <select name="post_category" id="">
            <?php
                $query = "SELECT * FROM category"; 
                $update_categories = mysqli_query($connection,$query);

                querycheck($update_categories);
                while($row = mysqli_fetch_assoc($update_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
            ?>


        </select>
    </div>
    
    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" name="post_content" id="edit" col="30" rows="10"> <?php echo $post_content; ?> </textarea> 
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#edit' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

    <div class="form-group">
        <label for="post_summary">Summary</label>
        <textarea class="form-control" name="post_summary" id="edit" col="30" rows="10"> <?php echo $post_summary; ?> </textarea> 
    </div>
    <div class="form-group">
        <label for="born">Born</label>
        <textarea class="form-control" name="born" id="edit" col="30" rows="10"> <?php echo $born; ?> </textarea> 
    </div>
    <div class="form-group">
        <label for="achievement">Achievement</label>
        <textarea class="form-control" name="achievement" id="edit" col="30" rows="10"> <?php echo $achievement; ?> </textarea> 
    </div>
    <div class="form-group">
        <label for="birth_place">Birth place</label>
        <textarea class="form-control" name="birth_place" id="edit" col="30" rows="10"> <?php echo $birth_place; ?> </textarea> 
    </div>
    
    
    <div class="form-group">
        <select name="post_status" id="">
            <option value='<?php echo $post_status;?>'><?php echo $post_status;?></option>
            <?php
                if($post_status=='published'){
                    echo "<option value='draft'>Draft</option>";
                }else{
                    echo "<option value='published'>Publish</option>";
                }
            ?>
        </select>
    </div> 
    <!-- <div class="form-group">
        <label for="post_status">Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div> -->
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>