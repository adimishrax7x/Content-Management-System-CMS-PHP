<!-- Blog Search Well -->

                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name ="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- formsearch -->
                    <!-- /.input-group -->
                </div>

                <!-- Login -->

                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name ="username" type="text" class="form-control" placeholder="Enter username ">
                      
                    </div>
                    <div class="input-group">
                        <input name ="password" type="password" class="form-control" placeholder="Enter password ">
                      <span class="input-group-btn">
                          <button class="btn btn-primary" name="login" type="submit">SUBMIT</button>
                      </span>
                    </div>
                    </form>
                    <!-- formsearch -->
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            
                <?php
                
                $query="SELECT * from categories LIMIT 7";
                $select_categories_query_sideBar = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_categories_query_sideBar)){
                    $cat_title=$row['cat_title'];
                    $cat_id=$row['cat_id'];
                    echo "<li> <a href='category.php?category=$cat_id'>{$cat_title}</a> </li>";

                }


                ?>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
            <?php include "includes/widget.php";?>