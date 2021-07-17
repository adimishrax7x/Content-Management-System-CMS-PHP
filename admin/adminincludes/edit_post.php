

<?php

            if(isset($_GET['p_id'])){
                $the_post_id= $_GET['p_id'];

                        $query="SELECT * from posts where post_id={$the_post_id}";
                        $select_posts_Id_query = mysqli_query($connection,$query);

                        while ($row = mysqli_fetch_assoc($select_posts_Id_query)){
                                $post_id=$row['post_id'];
                                $post_title=$row['post_title'];
                                $post_category_id=$row['post_category'];
                                $post_author=$row['post_author'];
                                $post_date=$row['post_date'];
                                $post_image=$row['post_image'];
                                $post_content=$row['post_content'];
                                $post_tags=$row['post_tags'];
                                $post_comment_count=$row['post_comment_count'];
                                $post_status=$row['post_status'];

                        }
                    }


                    if(isset($_POST['update_post'])){

                        $post_title= $_POST['post_title'];
                        $post_author = $_POST['post_author'];
                        $post_category_id= $_POST['post_category'];
                        $post_status= $_POST['post_status'];
                    
                        $post_image= $_FILES['post_image']['name'];
                        $post_image_temp=$_FILES['post_image']['tmp_name'];
                    
                        $post_tags=$_POST['post_tags'];
                        $post_content= $_POST['post_content'];
                        move_uploaded_file($post_image_temp,"../images/$post_image");

                    if(empty($post_image))
                       {
                            $query="SELECT * FROM posts where post_id={$the_post_id}";
                            $select_image=mysqli_query($connection,$query);

                            while($row = mysqli_fetch_array($select_image)){
                            $post_image=$row['post_image'];
                        }
                    }
                    

                        $query="UPDATE posts SET ";
                        $query.="post_title='{$post_title}',";
                        $query.="post_category_id='{$post_category_id}',";
                        $query.="post_date=now(),";
                        $query.="post_author='{$post_author}',";
                        $query.="post_status='{$post_status}',";
                        $query.="post_tags='{$post_tags}',";
                        $query.="post_content='{$post_content}',";
                        $query.="post_image='{$post_image}'";
                        $query.="WHERE post_id='{$the_post_id}' ";

                        $update_categories = mysqli_query($connection,$query); 
                        validateQuery($update_categories); 

                        echo "<div class='bg-success'>USER UPDATED" . "<a  href='post.php'>&nbsp VIEW POSTS</a> </div>" ;
                    }

?>

<form action="" method="post" enctype='multipart/form-data'>


<div class="form-group">
    <input type="text" class="form-control" value="<?php echo $post_title ?>"name="post_title" placeholder="Enter Title">
</div>
<div class="form-group">
    <input type="text" class="form-control" value="<?php echo $post_author ?>" name="post_author" placeholder="Enter Post Author">
</div>

<div class="form-group">
    <select name="post_category" >
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
    </select>
    <!-- <input type="text" class="form-control" value="<?php echo $post_category_id ?>" name="post_category_id" placeholder="Enter Category Id"> -->
</div>
<div class="form-group">

<select name="post_status">



<?php 
if($post_status==='published'){
    echo "<option value='published'>published</option>"; 
   echo " <option value='Draft'>Draft</option>";
}else{
    echo "<option value='published'>published</option>";
    echo " <option value='Draft'>Draft</option>";
}

?>

</select>
</div> 

<div class="form-group">
    <label for="post_image">Upload Image</label>
    <input type="file" class="form-control" value="" name="post_image"  >
    <img src="../images/<?php echo $post_image ?>" alt="">
</div>

<div class="form-group">
    <input type="text" class="form-control" value="<?php echo $post_tags ?>" name="post_tags" placeholder="Enter Post Tags">
</div> 

<div class="form-group">
    <textarea type="text" class="form-control" value="" name="post_content" cols='30' row='10' placeholder="Enter Content">
    <?php echo $post_content ?>
    </textarea>
</div>
<div class="form-group">
    <input type="submit" name="update_post" class="btn btn-dark">
</div>
</form>