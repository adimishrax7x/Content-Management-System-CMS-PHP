<?php

if(isset($_POST['create_post'])){
    
    $post_title= $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id= $_POST['post_category'];
    $post_status= $_POST['post_status'];

    $post_image= $_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];

    $post_tags=$_POST['post_tags'];
    $post_content= $_POST['post_content'];
    $post_date=date('d-m-y');
    

        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query="INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
        $query.="VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

        $insert_post_query_admin = mysqli_query($connection,$query);    
        
        validateQuery($insert_post_query_admin);
        echo "<div class='bg-success'>USER ADDED" . "<a  href='post.php'>&nbsp VIEW POSTS</a> </div>" ;
        
       

}

?>


<form action="" method="post" enctype='multipart/form-data'>


<div class="form-group">
    <input type="text" class="form-control" name="post_title" placeholder="Enter Title">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="post_author" placeholder="Enter Post Author">
</div>

<div class="form-group mx-4">
<select class="form-control" name="post_category" >
    <option value="none" selected disabled hidden>
          Select a category
    <?php
        $query="SELECT * from categories";
        $select_categories = mysqli_query($connection,$query); 
        validateQuery($select_categories);       

                               
        while ($row = mysqli_fetch_assoc($select_categories)){
        $cat_title=$row['cat_title'];
        $cat_id=$row['cat_id'];
    
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
    }
    ?>
    <!-- // <input type="text"  name="post_category_id" placeholder="Enter Category Id"> -->
</div>
<br>
<br>
<div class="form-group">

    <input type="text" class="form-control" name="post_status" placeholder="Enter Post Status">
</div>

<div class="form-group">
    <label for="post_image">Upload Image</label>
    <input type="file" class="form-control" name="post_image"  >
</div>

<div class="form-group">
    <input type="text" class="form-control" name="post_tags" placeholder="Enter Post Tags">
</div>

<div class="form-group">
    <textarea type="text" class="form-control" name="post_content" cols='30' row='10' placeholder="Enter Content"></textarea>
</div>
<div class="form-group">
    <input type="submit" name="create_post" class="btn btn-dark">
</div>
</form>