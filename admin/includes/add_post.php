<?php
    if(isset($_POST['create_post'])){
        $post_category_id= $_POST['post_category'];
        $post_title= $_POST['post_title'];
        $post_author= $_POST['post_author'];
        $post_date= date('d-m-y');
        $post_image= $_FILES['post_image']['name'];
        $post_image_temp= $_FILES['post_image']['tmp_name'];
        $post_content= $_POST['post_content'];
        $post_tags= $_POST['post_tags'];
        $post_summary= $_POST['post_summary'];
        $achievement= $_POST['achievement'];
        $born= $_POST['born'];
        $birth_place= $_POST['birth_place'];
        $post_status= $_POST['post_status'];
        move_uploaded_file($post_image_temp,"../images/$post_image");

        $post_content = mysqli_real_escape_string($connection,$post_content);
        $post_tags = mysqli_real_escape_string($connection,$post_tags);
        $achievement = mysqli_real_escape_string($connection,$achievement);
        $born = mysqli_real_escape_string($connection,$born);
        $birth_place = mysqli_real_escape_string($connection,$birth_place);
        $post_title = mysqli_real_escape_string($connection,$post_title);
        $post_author = mysqli_real_escape_string($connection,$post_author);
        $post_summary = mysqli_real_escape_string($connection,$post_summary);

        $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_image,
            post_content,post_tags,post_status,post_summary,achievement,born,birth_place) VALUES({$post_category_id},
        '{$post_title}','{$post_author}','{$post_image}','{$post_content}','{$post_tags}',
        '{$post_status}','{$post_summary}','{$achievement}','{$born}','{$birth_place}')";

        $create_post_query = mysqli_query($connection,$query);
        $the_post_id = mysqli_insert_id($connection);

        querycheck($create_post_query);
        echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='admin_posts.php'>View other posts</a></p>";


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
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <!-- <div class="form-group">
        <label for="born">Born in</label>
        <input type="text" class="form-control" name="born">
    </div> -->
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image">
    </div>



    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea id="add" class="form-control" name="post_content"  col="30" rows="10"></textarea>
    </div>
    <script>
        ClassicEditor
        .create( document.querySelector( '#add' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

    <div class="form-group">
        <label for="birth_place">Birth Place</label>
        <input type="text" class="form-control" name="birth_place">
    </div>
    <div class="form-group">
        <label for="born">Born</label>
        <input type="text" class="form-control" name="born">
    </div>
    <div class="form-group">
        <label for="achievement">Achievement</label>
        <input type="text" class="form-control" name="achievement">
    </div>
   
    <div class="form-group">
        <label for="post_summary">Summery</label>
        <input type="text" class="form-control" name="post_summary">
    </div>

    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
        </select>
        
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>