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


            $query="SELECT * from posts";
            $select_all_posts_query = mysqli_query($connection,$query);
            
            while ($row = mysqli_fetch_assoc($select_all_posts_query)){
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                $post_author=$row['post_author'];
                $post_date=$row['post_date'];
                $post_image=$row['post_image'];
                $post_content=substr($row['post_content'],100);
                $post_tags=$row['post_tags'];
                $post_status=$row['post_status'];

     
                
            ?>
             <!-- First Blog Post -->
             <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="pic1"></a>
                <hr>
                <p><?php echo $post_content?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>                


            <!-- Blog Sidebar Widgets Column -->

        <!-- /.row -->

        <hr>
            <?php
            }
            ?>
                        </div>
            <div class="col-md-4">

                <?php include "includes/sideBar.php" ;?>

            </div>

        </div> 

     <?php include "includes/footer.php" ;?>