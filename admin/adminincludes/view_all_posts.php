<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Author</td>
                                    <td>Title</td>
                                    <td>Category</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Comment count</td>
                                    <td>tags</td>
                                    <td>Date</td> 
                                </tr>
                            </thead>

                            <tbody>


                            <?php
                                $query="SELECT * from posts";
                                $select_all_posts_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_posts_query)){
                                    $post_id=$row['post_id'];
                                    $post_title=$row['post_title'];
                                    $post_category_id=$row['post_category_id'];
                                    $post_author=$row['post_author'];
                                    $post_date=$row['post_date'];
                                    $post_image=$row['post_image'];
                                    $post_content=$row['post_content'];
                                    $post_tags=$row['post_tags'];
                                    $post_comment_count=$row['post_comment_count'];
                                    $post_status=$row['post_status'];

                                    echo "<tr>";

                                    echo "<td>$post_id</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td>$post_title</td>";

                                    $query="SELECT * from categories where cat_id={$post_category_id}";
                                    $select_categories = mysqli_query($connection,$query); 
                                    validateQuery($select_categories);       
                            
                                                           
                                    while ($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];

                                    echo "<td>$cat_title</td>";



                                    echo "<td>$post_status</td>";
                                    echo "<td><img class='img-responsive' src='../images/$post_image' width='100px' ></td>";
                                    echo "<td>$post_comment_count</td>";                                  
                                    echo "<td>$post_tags</td>";                                  
                                    echo "<td>$post_date</td>";
                                    echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                                    echo "<td><a href='post.php?delete={$post_id}'>DELETE</a></td>";
                                    

                                    //echo "<td>$post_comment_count</td>";


                                    echo "</tr>";


                                }                    
                             }
                                       
                            ?>
 
                            
                            
                            </tbody>

                        </table>

                        <?php
                        
                        if(isset($_GET['delete'])){
                            //$_GET[]
                        }
                        $post_id=$_GET['delete'];

                        $query="DELETE FROM posts where post_id={$post_id}";
                        $delete_specific_posts_query = mysqli_query($connection,$query);
                 
                        ?>