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


if (isset($_POST["submit"])==True) {
    $search= $_POST['search'];    
    //echo $search;


$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

$search_query = mysqli_query($connection, $query);

if(!$search_query){
    die("QUERY FAILED ". mysqli_error($connection));
}

    $count = mysqli_num_rows($search_query);

    if($count==0){
        echo "<h1>NOT FOUND</h1>";
    }
    else{
        // $query="SELECT * from posts";
        // $select_all_posts_query = mysqli_query($connection,$query);
        
        while ($row = mysqli_fetch_assoc($search_query)){
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
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>                


        <!-- Blog Sidebar Widgets Column -->

    <!-- /.row -->

    <hr>
        <?php
        }
       
    }

}
?>
       
        </div>
            <div class="col-md-4">

                <?php include "includes/sideBar.php" ;?>

            </div>

        </div> 

     <?php include "includes/footer.php" ;?>