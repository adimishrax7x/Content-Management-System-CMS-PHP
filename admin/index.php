<?php include "adminincludes/header.php" ;?>
<body>

    <div id="wrapper">

    <?php include "adminincludes/nav.php" ;?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                           <small><?php
                           if($_SESSION['user_name']){
                              echo $_SESSION['user_name'];}
                            //echo $_SESSION['username'];}
                            ?>
</small> 
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                       
               <?php
               
               $query="SELECT * from posts";
                $select_all_posts = mysqli_query($connection,$query);

                $post_count=mysqli_num_rows($select_all_posts);


               ?>
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $post_count ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php
               
               $query="SELECT * from comments";
                $select_all_comments = mysqli_query($connection,$query);

                $comment_count=mysqli_num_rows($select_all_comments);


               ?>
                
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comment_count ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
<?php
                $query="SELECT * from users";
                $select_all_user = mysqli_query($connection,$query);

                $user_count=mysqli_num_rows($select_all_user);


               ?>
                

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $user_count ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php
                $query="SELECT * from categories";
                $select_all_categories = mysqli_query($connection,$query);
                $categories_count=mysqli_num_rows($select_all_categories);

                

               ?>


    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $categories_count ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


                <!-- /.row -->
                <?php
                $query="SELECT * from posts where post_status='draft'";
                $select_all_draft_posts = mysqli_query($connection,$query);
                $post_draft_count=mysqli_num_rows($select_all_draft_posts);
                
                $query="SELECT * from posts where post_status='published'";
                $select_all_published_posts = mysqli_query($connection,$query);
                $post_published_count=mysqli_num_rows($select_all_published_posts);

                $query="SELECT * from comments where comment_status='APPROVED'";
                $select_all_APPROVED_comments = mysqli_query($connection,$query);
                $APPROVED_comments_count=mysqli_num_rows($select_all_APPROVED_comments);

                $query="SELECT * from users where user_role='SUSCRIBER'";
                $select_all_SUSCRIBERS= mysqli_query($connection,$query);
                $SUSCRIBERS_count=mysqli_num_rows($select_all_SUSCRIBERS);

                
                ?>

                <div class="row">


                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php
          

          $element_text=['ALL POSTS','ACTIVE POSTS','PUBLISHED POSTS','COMMENTS','APPROVED COMMENTS','USERS','SUSCRIBERS','CATEGORIES'];
          $element_count=[$post_count,$post_draft_count, $post_published_count, $comment_count ,$APPROVED_comments_count,$user_count,$SUSCRIBERS_count,$categories_count];

          for($i=0; $i<7;$i++){

           echo "['{$element_text[$i]}'". ",". "{$element_count[$i]}],";

          }
          ?>

        // ['Post', 1000]

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



        <?php include "adminincludes/footer.php" ;?>
