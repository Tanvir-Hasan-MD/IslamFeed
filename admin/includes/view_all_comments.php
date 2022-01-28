<table class="table table-bordered table-hover">
                            <thead>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                                
                                
                            </thead>
                            <tbody>

                                <?php
                                    $query = "SELECT * FROM comments";
                                    $select_comments = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_comments)){
                                        $comment_id = $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_email = $row['author_email'];
                                        $comment_content = $row['comment_content'];
                                        $comment_status = $row['comment_status'];
                                        $comment_date = $row['comment_date'];
                                        

                                            echo "<tr>";
                                                echo "<td>$comment_id</td>";
                                                echo "<td>$comment_author</td>";
                                                echo "<td>$comment_content</td>";

                                                // $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
                                                // $edit_categories = mysqli_query($connection,$query);
                                                //     while($row = mysqli_fetch_assoc($edit_categories)){
                                                //         $cat_id = $row['cat_id'];
                                                //         $cat_title = $row['cat_title'];
                                                
                                                // echo "<td>{$cat_title}</td>";
                                                //     }


                                                echo "<td>$comment_email</td>";
                                                echo "<td>$comment_status</td>";
                                                
                                                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                                $comment_post_title_query = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_assoc($comment_post_title_query)){
                                                    $post_id = $row['post_id'];
                                                    $post_title = $row['post_title'];
                                                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";


                                                }

                                                
                                                echo "<td>$comment_date</td>";
                                                
                                                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                                                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                                
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

                             if(isset($_GET['approve'])){
                                 $approve_comment_id = $_GET['approve'];
                                 $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
                                 $approve_comment_query = mysqli_query($connection,$query);
                                header("Location:comments.php");
                            }
                              if(isset($_GET['unapprove'])){
                                $unapprove_comment_id = $_GET['unapprove'];
                                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
                                $unapprove_comment_query = mysqli_query($connection,$query);
                                header("Location:comments.php");
                            }

                            if(isset($_GET['delete'])){
                                $delete_comment_id = $_GET['delete'];
                                $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";
                                $delete_comment_query = mysqli_query($connection,$query);
                                header("Location:comments.php");
                            }
                        ?>
                        