
   <?php
        if(isset($_POST['checkboxArray'])){
            foreach($_POST['checkboxArray'] as $post_id_value){
               $arrayvariable = $_POST['options'];

               switch($arrayvariable){
                   case 'published': 
                        $query = "UPDATE posts SET post_status = '{$arrayvariable}' WHERE post_id = {$post_id_value}";
                        $update_post_statusPublish = mysqli_query($connection,$query);
                    break;
                    case 'draft': 
                        $query = "UPDATE posts SET post_status = '{$arrayvariable}' WHERE post_id = {$post_id_value}";
                        $update_post_statusDraft = mysqli_query($connection,$query);
                    break;
                    case 'delete': 
                        $query = "DELETE FROM posts WHERE post_id = {$post_id_value}";
                        $delete_post = mysqli_query($connection,$query);
                    break;
               }
            }
        }
    ?>  
    <div>

    <form action="" method="POST">             
                <table class="table table-bordered table-hover">
                    <div id="container" class="col-xs-12">
                        <select class="form-control" name="options" id="" >
                            <option value="">Select Options</option>
                            <option value="published">Publish</option>
                            <option value="draft">Draft</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>

                    <div class="col-xs-12 mt-4">
                        <input type="submit" name="submit" class="btn btn-success" value="Apply">
                        <button class="btn btn-primary mt-xs-2" href="admin_posts.php?source=add_post">Add New Post</button>
                    </div>
            </form>  
                            <thead>
                                <th><input id="selectbox" type="checkbox"></th>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Born</th>
                                <th>Summary</th>
                                <th>Achievement</th>
                                <th>Birth place</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Status</th>
                                <th>View Post</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </thead>
                            <tbody>

                                <?php
                                    $query = "SELECT * FROM posts";
                                    $select_posts = mysqli_query($connection,$query);
                                   

                                    while($row = mysqli_fetch_assoc($select_posts)){
                                        
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

                                            echo "<tr>";
                                            ?>
                                                <td><input class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $post_id;?>'></td>;
                                                <?php
                                                echo "<td>$post_id</td>";

                                                $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
                                                $edit_categories = mysqli_query($connection,$query);
                                                    while($row = mysqli_fetch_assoc($edit_categories)){
                                                        $cat_id = $row['cat_id'];
                                                        $cat_title = $row['cat_title'];
                                                
                                                echo "<td>{$cat_title}</td>";
                                                    }


                                                echo "<td>$post_title</td>";
                                                echo "<td>$post_author</td>";
                                                echo "<td>$post_date</td>";
                                                echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
                                                echo "<td>$post_content</td>";
                                                echo "<td>$born</td>";
                                                echo "<td>$post_summary</td>";
                                                echo "<td>$achievement</td>";
                                                echo "<td>$birth_place</td>";
                                                echo "<td>$post_tags</td>";
                                                echo "<td>$post_comment_count</td>";
                                                echo "<td>$post_status</td>";
                                                echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                                                echo "<td><a href='admin_posts.php?delete={$post_id}'>Delete</a></td>";
                                                echo "<td><a href='admin_posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                            echo "</tr>";


                                    }
                                ?>
                            
                                <!-- <td>10</td>
                                <td>Tanvir Hasan</td>
                                <td>coding</td>
                                <td>KICT</td>
                                <td>Status</td>
                                <td>Image</td>
                                <td>Tags</td>
                                <td>2/12/21</td>
                                <td>So Stressed</td> -->
                            
                        </tbody>
                        </table>
                        
                        <?php
                            if(isset($_GET['delete'])){
                                $delete_post_id = $_GET['delete'];
                                $query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
                                $delete_post_query = mysqli_query($connection,$query);
                                header("Location: admin_posts.php");
                            }
                        ?>
    </div>
            
         