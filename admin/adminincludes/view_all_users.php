<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Username</td>
                                    <td>Password</td>
                                    <td>FirstName</td>
                                    <td>LastName</td>
                                    <td>Email</td>
                                    <td>ROLE</td>
                          
                                </tr>
                            </thead>

                            <tbody>


                            <?php
                                $query="SELECT * from users";
                                $select_all_users_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_users_query)){
                                    $user_id=$row['user_id'];
                                    $user_name=$row['user_name'];
                                    $user_password=$row['user_password'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_email=$row['user_email'];
                                    $user_role=$row['user_role'];
                                    $user_randSalt=$row['user_randSalt'];

                                    echo "<tr>";

                                    echo "<td>$user_id</td>";
                                    echo "<td>$user_name</td>";
                                    echo "<td>$user_password</td>";
                                    echo "<td>$user_firstname</td>";
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                    //echo "<td>$user_randSalt</td>";


                                    // $query="SELECT * from categories where cat_id={$post_category_id}";
                                    // $select_categories = mysqli_query($connection,$query); 
                                    // validateQuery($select_categories);       
                            
                                                           
                                    // while ($row = mysqli_fetch_assoc($select_categories)){
                                    // $cat_title=$row['cat_title'];
                                    // $cat_id=$row['cat_id'];

                                    // echo "<td>$cat_title</td>";



                                    // echo "<td>$comment_status</td>";

                                    // $query="SELECT * from posts where post_id=$comment_post_id";
                                    // $select_post_id_query = mysqli_query($connection,$query); 
                                        

                                    // while ($row = mysqli_fetch_assoc($select_post_id_query)){
                                    //     $post_id = $row['post_id'];
                                    //     $post_title=$row['post_title'];

                                    //     echo "<td><a href='../post.php?p_id={$post_id}'>$post_title</a></td>";

                                    

                                    // echo "<td>$comment_date</td>";                                  
                                    echo "<td><a href='users.php?change_to_admin=$user_id'>Change to admin</a></td>";
                                    echo "<td><a href='users.php?change_to_suscriber=$user_id'>Change to Suscriber</a></td>";
                                    echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";

                                    

                                    // //echo "<td>$post_comment_count</td>";


                                    echo "</tr>";


                                }        
                             
                                       
                            ?>

                            
                            </tbody>

                        </table>

                        <?php


                        if(isset($_GET['change_to_admin'])){
                        }
                        $the_user_id_admin=$_GET['change_to_admin'];

                        $query="UPDATE users SET user_role='ADMIN' where user_id=$the_user_id_admin";
                        $change_to_admin = mysqli_query($connection,$query);
                        //header('Location :comments.php');
                                                

                        if(isset($_GET['change_to_suscriber'])){
                        }
                        $the_user_id_suscriber=$_GET['change_to_suscriber'];

                        $query="UPDATE users SET user_role='SUSCRIBER' where user_id=$the_user_id_suscriber";
                        $change_to_suscriber = mysqli_query($connection,$query);

                        //header('Location :comments.php');

                        
                        if(isset($_GET['delete'])){
                        }
                        $the_user_id_delete=$_GET['delete'];

                        $query="DELETE FROM users where user_id={$the_user_id_delete}";
                        $delete_specific_user_query = mysqli_query($connection,$query);
                        //header('Location :comments.php');
                        
                        ?>