<?php include "adminincludes/header.php" ;?>
<body>

    <div id="wrapper">

    <?php include "adminincludes/nav.php" ;?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
                        <div class="col-xs-6">

                        <?php

                            insert_categories();
                        
                        ?>

                    <form action="" method="post">
                    <div class="form-group">
                    <input class="form-control" type="text" name="cat_title" placeholder="Enter Category here">
                    </div>
                    <div class="form-group">
                    <input class="btn btn-light" type="submit" name="submit" value="Add Category">
                    </div>

                    
                    </form>

                        <?php  //update & include
                        if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            include "adminincludes/update_cat.php"; 
                        } 
                        ?>

                    </div>

                        <div class="col-xs-6">
                        <?php

                        ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query="SELECT * from categories";
                                $select_categories_query_admin = mysqli_query($connection,$query);        
                                
                                                            
                                while ($row = mysqli_fetch_assoc($select_categories_query_admin)){
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];                            ?>
                                <tr>
                                <?php
                                    echo "<td>{$cat_id}</td><td> {$cat_title} </td><td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>";

                                }          
                                
                               
                                ?>
                                </tr>
                                <?php

                                    
                                    $del_cat_id=$_GET['delete'];
                                    $query="DELETE FROM categories where cat_id= {$del_cat_id} ";
                                    $delete_categories_query_admin = mysqli_query($connection,$query);    
                                
                                    //header('location:categories.php');
                                
                                ?>
                                
                               
                            </tbody> 
                        </table>



                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



        <?php include "adminincludes/footer.php" ;?>
