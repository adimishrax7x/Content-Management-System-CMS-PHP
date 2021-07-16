<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Author</td>
                                    <td>Comment</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>In response to</td>
                                    <td>Date</td>
                          
                                </tr>
                            </thead>

                            <tbody>


                            <?php
                                $query="SELECT * from comments";
                                $select_all_comments_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_comments_query)){
                                    $comment_id=$row['comment_id'];
                                    $comment_post_id=$row['comment_post_id'];
                                    $comment_content=$row['comment_content'];
                                    $comment_author=$row['comment_author'];
                                    $comment_date=$row['comment_date'];
                                    $comment_email=$row['comment_email'];
                                    $comment_status=$row['comment_status'];

                                    echo "<tr>";

                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";
                                    echo "<td>$comment_email</td>";

                                    // $query="SELECT * from categories where cat_id={$post_category_id}";
                                    // $select_categories = mysqli_query($connection,$query); 
                                    // validateQuery($select_categories);       
                            
                                                           
                                    // while ($row = mysqli_fetch_assoc($select_categories)){
                                    // $cat_title=$row['cat_title'];
                                    // $cat_id=$row['cat_id'];

                                    // echo "<td>$cat_title</td>";



                                    echo "<td>$comment_status</td>";

                                    $query="SELECT * from posts where post_id=$comment_post_id";
                                    $select_post_id_query = mysqli_query($connection,$query); 
                                        

                                    while ($row = mysqli_fetch_assoc($select_post_id_query)){
                                        $post_id = $row['post_id'];
                                        $post_title=$row['post_title'];

                                        echo "<td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";

                                    }

                                    echo "<td>$comment_date</td>";                                  
                                    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                                    echo "<td><a href='comments.php?unapprove=$comment_id'>Reject</a></td>";
                                    // echo "<td><a href='post.php?source=edit_post&p_id='>Edit</a></td>";
                                    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                    

                                    //echo "<td>$post_comment_count</td>";


                                    echo "</tr>";


                                                
                             }
                                       
                            ?>

                            
                            </tbody>

                        </table>

                        <?php


                        if(isset($_GET['approve'])){
                        }
                        $the_comment_id=$_GET['approve'];

                        $query="UPDATE comments SET comment_status='APPROVED' where comment_id=$the_comment_id";
                        $approve_status_comment_query = mysqli_query($connection,$query);
                        //header('Location :comments.php');
                                                

                        if(isset($_GET['unapprove'])){
                        }
                        $the_comment_id=$_GET['unapprove'];

                        $query="UPDATE comments SET comment_status='UNAPPROVED' where comment_id=$the_comment_id";
                        $unapprove_status_comment_query = mysqli_query($connection,$query);

                        //header('Location :comments.php');

                        
                        if(isset($_GET['delete'])){
                        }
                        $the_comment_id=$_GET['delete'];

                        $query="DELETE FROM comments where comment_id={$the_comment_id}";
                        $delete_specific_comment_query = mysqli_query($connection,$query);
                        //header('Location :comments.php');
                        
                        ?>