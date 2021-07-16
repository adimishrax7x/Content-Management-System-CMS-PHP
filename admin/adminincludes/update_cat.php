
                    
                    <form action="" method="post">

<?php

if(isset($_GET['edit']))
{ 
   $cat_id=$_GET['edit'];
    $query="SELECT * from categories WHERE cat_id =$cat_id";
    $select_categories_id_query_admin = mysqli_query($connection,$query);        

                                
    while ($row = mysqli_fetch_assoc($select_categories_id_query_admin)){
        $cat_title=$row['cat_title'];
        $cat_id=$row['cat_id'];}
    
?>

<div class="form-group">
<input value="<?php if(isset($cat_title)) echo $cat_title;  ?>" class="form-control" type="text" name="cat_title" placeholder="Update Category here">
</div>

<?php
}
?>


<?php


    $edit_cat_title=$_POST['cat_title'];
    $query="UPDATE categories SET cat_title='{$edit_cat_title}' where cat_id= {$cat_id} ";
$edit_categories_query_admin = mysqli_query($connection,$query);
if(!$edit_categories_query_admin){
    die("QUERY FAILED".mysqli_error($connection));
        }



?>

<div class="form-group">
<input class="btn btn-light" type="submit" name="update_category" value="Edit Category">
</div>


</form>

