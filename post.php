<?php include "includes/db.php" ;?>

<?php include "includes/header.php" ;?>

<body>
     <!-- Navigation -->
<?php include "includes/nav.php" ;?>

    <!-- Page Content -->
    <div class="container">
    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            
            <?php

            if(isset($_GET['p_id'])){

                $the_post_id = $_GET['p_id'];
            }

            $query="SELECT * from posts where post_id = {$the_post_id}";
            $select_all_posts_query = mysqli_query($connection,$query);
            
            while ($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=$row['post_content'];
                $post_tags=$row['post_tags'];

                
            ?>
             <!-- First Blog Post -->
             <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="pic1">
                <hr>
                <p><?php echo $post_content?></p>
                

                


            <!-- Blog Sidebar Widgets Column -->

        <!-- /.row -->

        <hr>
            <?php
            }
            ?>
                <?php

                    if(isset($_POST['comment_submit'])){
                        $the_post_id = $_GET['p_id'];
                        $comment_author= $_POST['comment_author'] ;
                        $comment_email= $_POST['comment_email'] ;
                        $comment_content= $_POST['comment_content'] ;

                        $query="INSERT into comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
                        $query.="VALUES($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','UNAPRROVED',now() )";

                        $created_comment =mysqli_query($connection,$query);
                        if(!$created_comment){
                            die("ERROR ".mysqli_error($connection));
                        }
                    
                        $query="UPDATE posts SET post_comment_count=post_comment_count+1 ";
                        $query.="where post_id={$the_post_id}";
                        $update_comment_count =mysqli_query($connection,$query);

;

                        
                    }

                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action='' method="post">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input type="text" class="form-control" name="comment_author" id="">                        
                    </div>
                    <div class="form-group">
                    <label for="comment_email">Email</label>
                        <input type="email" class="form-control" name="comment_email" id="">                        
                    </div>
                    <div class="form-group">                        
                        <label for="comment_content">Comment</label>
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div>

                        <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->


                <?php
                
                $query="SELECT * from comments where comment_post_id={$the_post_id} ";
                $query.="AND comment_status='APPROVED' ";
                $query.="order by comment_id DESC";

                $select_all_comments_for_post_query = mysqli_query($connection,$query);
                    if(!$select_all_comments_for_post_query){
                        die("QUERY FAILED ".mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_assoc($select_all_comments_for_post_query)){
                        $comment_author=$row['comment_author'];
                        $comment_email=$row['comment_email'];
                        $comment_content=$row['comment_content'];
                        $comment_date=$row['comment_date'];



?>


                    <!-- Comment -->
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;  ?>
                            <small><?php echo $comment_date?></small>
                        </h4>
                        <?php echo $comment_content             ?>      </div>
                </div>


                <?php
                    }
                ?>
                    

               

              


                        </div>
            <div class="col-md-4">

                <?php include "includes/sideBar.php" ;?>

            </div>

        </div> 

     <?php include "includes/footer.php" ;?>